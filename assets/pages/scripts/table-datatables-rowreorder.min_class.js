var TableDatatablesRowreorder = function () {
    var e = function () {
        var e = $(".dataTable_class");
        var selar = $('.dataTable_class').attr('array_index');
        if (selar == '' || selar == undefined) {
            index_ar = '';
        } else {
            var index_ar = {
                columns: selar.split(',')
            };
        }
        e.dataTable({
            language: {
                aria: {
                    sortAscending: ": activate to sort column ascending",
                    sortDescending: ": activate to sort column descending"
                },
                emptyTable: "No data available in table",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                infoEmpty: "No entries found",
                infoFiltered: "(filtered1 from _MAX_ total entries)",
                lengthMenu: "_MENU_ entries",
                search: "Search:",
                zeroRecords: "No matching records found"
            },
            buttons: [{
                    extend: "pdf",
                    className: "btn green btn-outline",
                    exportOptions: index_ar
                }, {
                    extend: "csv",
                    className: "btn purple btn-outline ",
                    exportOptions: index_ar
                }],
            rowReorder: {},
            order: [
                [0, "asc"]
            ],
            lengthMenu: [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"]
            ],
            pageLength: 10,
            dom: "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"
        })
    },
            o = function () {
                var e = $("#sample_2");
                e.dataTable({
                    language: {
                        aria: {
                            sortAscending: ": activate to sort column ascending",
                            sortDescending: ": activate to sort column descending"
                        },
                        emptyTable: "No data available in table",
                        info: "Showing _START_ to _END_ of _TOTAL_ entries",
                        infoEmpty: "No entries found",
                        infoFiltered: "(filtered1 from _MAX_ total entries)",
                        lengthMenu: "_MENU_ entries",
                        search: "Search:",
                        zeroRecords: "No matching records found"
                    },
                    buttons: [{
                            extend: "print",
                            className: "btn default"
                        }, {
                            extend: "pdf",
                            className: "btn default"
                        }, {
                            extend: "csv",
                            className: "btn default"
                        }],
                    colReorder: {
                        reorderCallback: function () {
                            console.log("callback")
                        }
                    },
                    rowReorder: {},
                    order: [
                        [0, "asc"]
                    ],
                    lengthMenu: [
                        [5, 10, 15, 20, -1],
                        [5, 10, 15, 20, "All"]
                    ],
                    pageLength: 10,
                    dom: "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"
                })
            };
    return {
        init: function () {
            jQuery().dataTable && (e(), o())
        }
    }
}();
jQuery(document).ready(function () {
    TableDatatablesRowreorder.init()
});