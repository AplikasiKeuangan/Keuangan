<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset('template/dist/img/logo1.png')}}" style="width:100px; max-width:100px;"><br>
								<h3>SMP IT AN NAHL</h3>
								
                            </td>
                            
                            <td>
							
							<i>VII Koto, Jl. Tan Malaka, <br> Guguak VIII Koto, Guguak, <br> Kabupaten Lima Puluh Kota, <br> Sumatera Barat 26253</i>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
					<tr class="heading">
						<td colspan="3" align="center">
							KWITANSI Pembayaran SPP SMP IT AN NAHL
						</td>
						
					</tr>
						
                        <tr>
                            <td>
                                No. Pembayaran <br>
                                Tanggal<br>
                                NIS <br>
								Nama Siswa/i <br>
								
                            </td>
							<td>
                                : <br>
                                :<br>
                                : <br>
								: <br>
								
                            </td>
                            
                            <td>
								{{$pembayaran->id_pembayaran}}<br>
                                {{$pembayaran->created_at->format('d, M Y')}}<br>
                                {{$pembayaran->siswa->nis}}<br>
                                {{$pembayaran->siswa->nama_lengkap}} <br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Keterangan
                </td>
                
                <td>
				
                   Jumlah (Rp.)
                </td>
            </tr>
            
            <tr class="details">
                <td>
                 Pembayaran  {{$pembayaran->tagihan->jenis}}
                </td>
                
                <td>
                    {{ 'Rp '.number_format($pembayaran->jumlah_pembayaran,2)}}
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
				@if($sisa != 0)
				 	{{ $output }}
				@endif
                </td>
            </tr>
			<tr class="total">
                <td></td>
                
                <td>
				<p align="center">
				@php
				$tgl=date('d-m-Y');
				echo  'Guguak, ',$tgl;
				@endphp
				</p><br><br><br>
				<p align="center"> (...............)</p>
                </td>
				
            </tr>
        </table>
		<button onclick="window.print()">Print this page</button>
    </div>

	<script>
	function pdf(){
		
	}
	</script>
</body>
</html>