'use strict'
Vue.mixin({
  data: function () {
    return {
      loading: false,
      errored: false,
      listItemCart: [],
      totalPrice: 0
    }
  },
  created () {
    this.getListItemCart()
  },
  methods: {
    getListItemCart () {
      let self = this
      axios.get('/checkout/get-item-cart').then(response => {
        self.listItemCart = response.data.data.products
        self.totalPrice = response.data.data.total_price
      }).catch(error => {
        console.log(error)
        self.errored = true
      }).finally(() => self.loading = false)
    },
    addToCart (item) {
      let self = this
      self.loading = true
      if (_.isEmpty(item)) {
        alert('Please selected product item!')
        return
      }
      axios.post('/checkout/addtocart', item).then(response => {
        self.loading = false
        showNotificationMessage(response.data)
        if (!_.isEmpty(item.redirectUrl)) {
          window.location.href = item.redirectUrl
        }
        self.getListItemCart() //TODO: Remove optimize code
      }).catch(error => {
        console.log(error)
        self.errored = true
      }).finally(() => self.loading = false)
    },
    updateItemCart () {
      let self = this,
        dataSend = {
          data: self.listItemCart
        }
      self.loading = true
      axios.post('/checkout/update', dataSend).then(response => {
        let responseData = response.data
        self.loading = false
        if (!_.isEmpty(responseData.data) && !_.isEmpty(responseData.data.redirectUrl)) {
          window.location.href = responseData.data.redirectUrl
        }
      }).catch(error => {
        console.log(error)
        self.errored = true
      }).finally(() => self.loading = false)
    },
    removeItemCart (item, index) {
      let self = this;
      self.loading = true;
      item.product_id = item.id
      axios.post('/checkout/removecart', item).then(response => {
        self.loading = false
        self.listItemCart.splice(index, 1);
        showNotificationMessage(response.data)
      }).catch(error => {
        console.log(error)
        self.errored = true
      }).finally(() => self.loading = false)
    },
    removeAllItemCart() {
      if (!confirm('Do you have delete all item?')) {
        return;
      }
      let self = this;
      self.loading = true;
      let dataSend = {
        delete_all: true
      }
      axios.post('/checkout/removeallcart', dataSend).then(response => {
        self.loading = false
        if (response.data.status === 'info') {
          self.listItemCart = []
          showNotificationMessage(response.data)
        }
      }).catch(error => {
        console.log(error)
        self.errored = true
      }).finally(() => self.loading = false)
    },
    calculateTotalPrice () {
      console.log('calculate total price')
    }
  }
});

Vue.filter('formatPrice', function (value) {
  if (typeof value !== 'number') {
    return value
  }
  var formatter = new Intl.NumberFormat('vi', {
    style: 'currency',
    currency: 'VND',
    minimumFractionDigits: 0
  })
  return formatter.format(value)
})