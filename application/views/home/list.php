<?php	$this->load->view('template/header');  ?>
<script type="text/javascript" class="init">
	$(document).ready(function() {
	    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
	    {
	        return {
	            "iStart": oSettings._iDisplayStart,
	            "iEnd": oSettings.fnDisplayEnd(),
	            "iLength": oSettings._iDisplayLength,
	            "iTotal": oSettings.fnRecordsTotal(),
	            "iFilteredTotal": oSettings.fnRecordsDisplay(),
	            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
	            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
	        };
	    };

	    var t = $("#example").DataTable({
	        initComplete: function() {
	            var api = this.api();
	            $('#example_filter input')
	                    .off('.DT')
	                    .on('keyup.DT', function(e) {
	                        if (e.keyCode == 13) {
	                            api.search(this.value).draw();
	                }
	            });
	        },
	        oLanguage: {
	            sProcessing: "Memuat ...",
	            sSearch: "Cari",
			    oPaginate: {
			        "sNext": "Selanjutnya","sPrevious": "Sebelumnya"
			      },
			    sLengthMenu: 'Tampilkan <select>'+
						        '<option value="10">10</option>'+
						        '<option value="20">20</option>'+
						        '<option value="30">30</option>'+
						        '<option value="40">40</option>'+
						        '<option value="50">50</option>'+
						        '<option value="-1">Semua</option>'+
						        '</select> hasil',
				sInfo: "Menampilkan (_START_ - _END_) dari _TOTAL_ hasil",
	        },
	        processing: true,
	        serverSide: true,
	        ajax: {"url": "api/json", "type": "POST"},
	        columns: [
	            {
	                "data": "id",
	                "orderable": false
	            },{"data": "nama_url"},
	            {"data": "domain_url",
	            	render: function(data, type, row, meta) { 
	                      return '<a href="'+row['domain_url']+'" target="_blank">'+row['domain_url']+'</a>'
                  	},
                  },{"data": "alt_url",
                  		render: function(data, type, row, meta) { 
	                      return '<a href="'+row['alt_url']+'">'+row['alt_url']+'</a>'
                  	},
              }
	        ],
	        order: [[0, 'asc']],
	        rowCallback: function(row, data, iDisplayIndex) {
	            var info = this.fnPagingInfo();
	            var page = info.iPage;
	            var length = info.iLength;
	            var index = page * length + (iDisplayIndex + 1);
	            $('td:eq(0)', row).html(index);
	        }
	    });
	});
</script>
		<table id="example" class="ui yellow celled table" width="100%">
		  <thead>
		    <tr>
		      <th>No</th>
		      <th>Nama</th>
		      <th>Main URL</th>
		      <th>Alternative URL</th>
		    </tr>
		  </thead>
		</table>
		
<?php	$this->load->view('template/footer');  ?>