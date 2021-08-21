'use strict';
// Register package global
Vue.use(VeeValidate);
Vue.component('ValidationProvider', VeeValidate.ValidationProvider);
Vue.component('ValidationObserver', VeeValidate.ValidationObserver);
const vi = {
  'code': 'vi',
  'messages': {
    'alpha': '{_field_} chỉ có thể sử dụng bảng chữ cái',
    'alpha_num': '{_field_} chỉ có thể chứa các ký tự chữ và số',
    'alpha_dash': '{_field_} chỉ có thể chứa các ký tự chữ và số, dấu gạch nối và dấu gạch dưới',
    'alpha_spaces': '{_field_} chỉ có thể chứa bảng chữ cái và dấu cách',
    'between': '{_field_} phải nằm trong khoảng {min} đến {max}',
    'confirmed': '{_field_} không khớp',
    'digits': '{_field_} phải là {chiều dài} chữ số',
    'dimensions': '{_field_} phải nằm trong chiều rộng {width} px và height {height} px',
    'email': '{_field_} không phải là địa chỉ email hợp lệ',
    'excluded': '{_field_} là một giá trị không hợp lệ',
    'ext': '{_field_} không phải là định dạng tệp hợp lệ',
    'image': '{_field_} không phải là định dạng hình ảnh hợp lệ',
    'is': '{_field_} không khớp',
    'length': '{_field_} phải là {length} ký tự',
    'max_value': '{_field_} phải nhỏ hơn hoặc bằng {max}',
    'max': '{_field_} phải nhỏ hơn {length} ký tự',
    'mimes': '{_field_} không phải là định dạng tệp hợp lệ',
    'min_value': '{_field_} phải lớn hơn hoặc bằng {min}',
    'min': '{_field_} phải có ít nhất {length} ký tự',
    'numeric': '{_field_} chỉ có thể chứa số',
    'oneOf': '{_field_} không phải là giá trị hợp lệ',
    'regex': 'Định dạng của {_field_} không chính xác',
    'required': '{_field_} là trường bắt buộc',
    'required_if': '{_field_} là trường bắt buộc',
    'size': '{_field_} phải nhỏ hơn {size} KB'
  }
};

for (let key in vi.messages) {
  VeeValidate.extend(key, VeeValidateRules[key]);
}
VeeValidate.localize('vi', vi);

Vue.mixin({
  data: function () {
    return {
      loading: false,
      errored: false,
      listItemCart: [],
      totalPrice: 0,
      screenDisplay: "login",
      customer: {
        first_name: '',
        last_name: '',
        username: '',
        password: '',
        email: '',
        phone: '',
        gender: '',
        birthday: '',
        captcha: ''
      }
    };
  },
  computed: {
    now: function () {
      return Date.now();
    }
  },
  methods: {
    getListItemCart () {
      let self = this;
      axios.get(window.app.Urls.MINI_CART).then(response => {
        self.listItemCart = response.data.data.products;
        self.totalPrice = response.data.data.total_price;
      }).catch(error => {
        console.log(error);
        self.errored = true;
      }).finally(() => self.loading = false);
    },
    addToCart (item) {
      let self = this;
      self.loading = true;
      if (_.isEmpty(item)) {
        alert(window.app.Resources.SELECT_ITEM);
        return;
      }
      axios.post(window.app.Urls.ADD_TO_CART, item).then(response => {
        self.loading = false;
        showNotificationMessage(response.data);
        if (!_.isEmpty(item.redirectUrl)) {
          window.location.href = item.redirectUrl;
        }
        self.getListItemCart(); //TODO: Remove optimize code
      }).catch(error => {
        console.log(error);
        self.errored = true;
      }).finally(() => self.loading = false);
    },
    updateItemCart () {
      let self = this,
          dataSend = {
            data: self.listItemCart
          };
      self.loading = true;
      axios.post(window.app.Urls.UPDATE_CART, dataSend).then(response => {
        let responseData = response.data;
        self.loading = false;
        if (!_.isEmpty(responseData.data) && !_.isEmpty(responseData.data.redirectUrl)) {
          window.location.href = responseData.data.redirectUrl;
        }
      }).catch(error => {
        console.log(error);
        self.errored = true;
      }).finally(() => self.loading = false)
    },
    removeItemCart (item, index) {
      let self = this;
      self.loading = true;
      item.product_id = item.id;
      axios.post(window.app.Urls.REMOVE_CART, item).then(response => {
        self.loading = false;
        self.listItemCart.splice(index, 1);
        showNotificationMessage(response.data);
      }).catch(error => {
        console.log(error);
        self.errored = true;
      }).finally(() => self.loading = false);
    },
    removeAllItemCart () {
      if (!confirm(window.app.Resources.REMOVE_ALL_ITEMS)) {
        return;
      }
      let self = this;
      self.loading = true;
      let dataSend = {
        delete_all: true
      };
      axios.post(window.app.Urls.REMOVE_ALL_CART, dataSend).then(response => {
        self.loading = false;
        if (response.data.status === 'info') {
          self.listItemCart = [];
          showNotificationMessage(response.data);
        }
      }).catch(error => {
        console.log(error);
        self.errored = true;
      }).finally(() => self.loading = false);
    },
    registerCustomer () {
      const isValid = this.$refs.registerForm.validate();
      if (!isValid) {
        return;
      }
      let self = this;
      let dataSend = self.customer;
      self.loading = true;
      axios.post(window.app.Urls.REGISTER_USER, dataSend).then(response => {
        let responseData = response.data;
        self.loading = false;
        let message = {};
        if (responseData.status) {
          message.status = 'success';
        } else {
          message.status = 'error';
        }
        message.message = responseData.message;
        showNotificationMessage(message);
        if (!_.isEmpty(responseData)
          && responseData.status
          && responseData.data
          && responseData.data.redirectUrl) {
          self.loading = false;
          self.$refs.registerForm.reset();
          self.customer = {
            first_name: '',
            last_name: '',
            username: '',
            password: '',
            email: '',
            phone: '',
            gender: '',
            birthday: '',
            captcha: ''
          };
          jQuery('#myLogin').modal({
            show: false
          });
          window.location.href = responseData.data.redirectUrl;
        }
      }).catch(error => {
        console.log(error);
        self.errored = true;
      }).finally(() => self.loading = false);
    },
    refreshCaptcha () {
      let self = this;
      self.loading = true;
      axios.get(window.app.Urls.REFRESH_RECAPTCHA).then(response => {
        let responseData = response.data;
        self.loading = false;
        if (!_.isEmpty(responseData.data) && !_.isEmpty(responseData.data.captcha)) {
          jQuery('#refresh-captcha').html(responseData.data.captcha);
        }
      }).catch(error => {
        console.log(error);
        self.errored = true;
      }).finally(() => self.loading = false);
    }
  }
});

Vue.filter('formatPrice', function (value) {
  if (typeof value !== 'number') {
    return value;
  }
  let formatter = new Intl.NumberFormat('vi', {
    style: 'currency',
    currency: 'VND',
    minimumFractionDigits: 0
  });
  return formatter.format(value);
});
