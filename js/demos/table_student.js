$(function() {
  var table_1 = $('#table-1').dataTable ({
    "sAjaxSource": "./js/demos/table_student_data.json",
    "aoColumns": [
      { "mData": "studentid" },
      { "mData": "studentnumber" },
      { "mData": "lastname" },
      { "mData": "firstname", "sClass": "text-center" },
      { "mData": "middlename", "sClass": "text-center" }
    ],
    "fnInitComplete": function(oSettings, json) {
      $(this).parents ('.dataTables_wrapper').find ('.dataTables_filter input').prop ('placeholder', 'Table Search...').addClass ('form-control input-sm')
    }
  })
})