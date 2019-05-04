//== Class definition

var DatatableChildRemoteDataUser = function() {
    //== Private functions

    // demo initializer
    var demo = function() {

        var datatable = $('.m_datatable').mDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        url: _url_datatable_user,
                        method: 'POST'
                    }
                },
                pageSize: 10,
                serverPaging: true,
                serverFiltering: false,
                serverSorting: true,
            },

            // layout definition
            layout: {
                theme: 'default',
                scroll: false,
                height: null,
                footer: false,
            },

            // column sorting
            sortable: true,

            pagination: true,

            detail: {
                title: 'Load sub table',
                content: subTableInit,
            },

            search: {
                input: $('#generalSearch'),
            },

            // columns definition
            columns: [
                {
                    field: 'id',
                    title: '',
                    sortable: false,
                    width: 20,
                    textAlign: 'center',
                }, {
                    field: 'checkbox',
                    title: '',
                    template: '{{id}}',
                    sortable: false,
                    width: 20,
                    textAlign: 'center',
                    selector: {class: 'm-checkbox--solid m-checkbox--brand'},
                }, {
                    field: 'name',
                    title: 'name',
                    sortable: 'asc',
                    template: function(row) {

                        return '<a href="users/'+row["id"]+'">'+row["name"]+'</a>';
                    }
                }, {
                    field: 'email',
                    title: 'Email',
                },
                {
                    field: 'status',
                    title: 'Status',
                    // callback function support for column rendering
                    template: function(row) {
                        var status = {
                            1: {'title': 'Enable', 'class': ' m-badge--success'},
                            0: {'title': 'Disable', 'class': ' m-badge--danger'},
                        };
                        return '<span class="m-badge ' + status[row.status].class + ' m-badge--wide">' + status[row.status].title + '</span>';
                    },
                }, {
                    field: 'Actions',
                    width: 110,
                    title: 'Actions',
                    sortable: false,
                    overflow: 'visible',
                    template: function (row, index, datatable) {
                        var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                        var template = $('.team-action').clone();
                        template.show();
                        template.find('a').attr('href',"users/"+row["id"]+"/edit");
                        template.find('form').attr('action',"users/"+row["id"]);
                        if ( _has_edit === false){
                            template.find('a').remove();
                        }

                        if ( _has_delete === false){
                            template.find('form').remove();
                        }

                        return template.html();
                    },
                }],
        });

        function subTableInit(e) {
            $('<div/>').attr('id', 'child_data_ajax_' + e.data.id).appendTo(e.detailCell).mDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: _url_datatable_project_user,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                'x-my-custom-header': 'some value', 'x-test-header': 'the value'
                            },
                            params: {
                                query: {
                                    generalSearch: '',
                                    userID: e.data.id,
                                },
                            },
                        },
                    },
                    pageSize: 10,
                    serverPaging: true,
                    serverFiltering: false,
                    serverSorting: true,
                },

                // layout definition
                layout: {
                    theme: 'default',
                    scroll: true,
                    height: 300,
                    footer: false,

                    // enable/disable datatable spinner.
                    spinner: {
                        type: 1,
                        theme: 'default',
                    },
                },

                sortable: true,

                // columns definition
                columns: [
                    {
                        field: 'id',
                        title: '#',
                        sortable: false,
                        width: 20,
                        responsive: {hide: 'xl'},
                    },
                    {
                        field: 'name',
                        title: 'Name',
                    },
                    {
                        field: 'kind',
                        title: 'Kind',
                    },
                    {
                        field: 'quantity',
                        title: 'Quantity',
                    },
                    {
                        field: 'date_from',
                        title: 'Date from',
                    },
                    {
                        field: 'date_to',
                        title: 'Date to',
                    },
                    {
                        field: 'status',
                        title: 'Status',
                        // callback function support for column rendering
                        template: function(row) {
                            var status = {
                                1: {'title': 'Enable', 'class': ' m-badge--success'},
                                0: {'title': 'Disable', 'class': ' m-badge--danger'},
                            };
                            return '<span class="m-badge ' + status[row.status].class + ' m-badge--wide">' + status[row.status].title + '</span>';
                        },
                    }
                    ],
            });
        }
    };

    return {
        //== Public functions
        init: function() {
            // init dmeo
            demo();
        },
    };
}();

jQuery(document).ready(function() {
    DatatableChildRemoteDataUser.init();
});