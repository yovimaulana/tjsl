


<html>

    <head>
    
    <style type="text/css">
        body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Calibri"; font-size:x-small }
        a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
        a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
        comment { display:none;  } 
    </style>
    
    </head>
    
    <body>
    <table cellspacing="0" border="0">
    <tr>
        <td colspan="6" style="width:5px;"  align="left" valign=middle ><b><font face="Arial" size=4 color="#000000">Rekapitulasi Data Anggaran PUMK </font></b></td>
    </tr>
    <tr>
        <td colspan="6" style="width:5px;"  align="left" valign=middle ><b><font face="Arial" size=4 color="#000000">{{$tahun == null? '':$tahun}}</font></b></td>
    </tr>
    <tr>
        <td colspan="6" style="width:5px;"  align="left" valign=middle ><b><font face="Arial" size=4 color="#000000">Waktu Cetak : {{date('d-F-Y')}} </font></b></td>
    </tr>
    <tr></tr>
    <tr>
        <td rowspan="2" style="width:5px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" align="center" valign=middle ><b><font face="Arial" size=4 color="#000000">No</font></b></td>
        <td rowspan="2" style="width:10px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle ><b><font face="Arial" size=4 color="#000000">Tahun</font></b></td>
        <td rowspan="2" style="width:40px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle ><b><font face="Arial" size=4 color="#000000">Perusahaan</font></b></td>
        <td rowspan="2" style="width:20px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle ><b><font face="Arial" size=4 color="#000000">Periode Laporan</font></b></td>
        <td rowspan="2" style="width:15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle ><b><font face="Arial" size=4 color="#000000">Status</font></b></td>
        <td colspan="6" style="width:15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle ><b><font face="Arial" size=4 color="#000000">Dana Tersedia</font></b></td>
        <td colspan="4" style="width:30px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle ><b><font face="Arial" size=4 color="#000000">Dana Disalurkan</font></b></td>
        <td rowspan="2" style="width:30px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" align="center" valign=middle ><b><font face="Arial" size=4 color="#000000">Saldo Akhir</font></b></td>
    </tr>
    <tr>
        <td style="width:30px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle ><b><font face="Arial" size=4 color="#000000">Saldo Awal</font></b></td>
        <td style="width:30px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle ><b><font face="Arial" size=4 color="#000000">Pengembalian Dana Mitra Binaan</font></b></td>
        <td style="width:35px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle ><b><font face="Arial" size=4 color="#000000">Pengembalian Dana BUMN Pembina Lain</font></b></td>
        <td style="width:30px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle ><b><font face="Arial" size=4 color="#000000">Pendapatan Jasa Admin PUMK</font></b></td>
        <td style="width:30px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle ><b><font face="Arial" size=4 color="#000000">Pendapatan Admin Bank</font></b></td>
        <td style="width:30px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle ><b><font face="Arial" size=4 color="#000000">Total Dana Tersedia</font></b></td>
        <td style="width:30px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle ><b><font face="Arial" size=4 color="#000000">Penyaluran Mandiri</font></b></td>
        <td style="width:30px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle ><b><font face="Arial" size=4 color="#000000">Penyaluran Kolaborasi/BUMN</font></b></td>
        <td style="width:30px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle ><b><font face="Arial" size=4 color="#000000">Penyaluran BUMN Khusus</font></b></td>
        <td style="width:30px; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle ><b><font face="Arial" size=4 color="#000000">Total Dana Disalurkan</font></b></td>      
    </tr>
        
    @php $num = 1; $total=0; @endphp
    @foreach($anggaran_pumk as $a)
    <tr>
        <td align="center">{{$num++}}</td>
        <td align="center">{{$a->tahun}}</td>
        <td>{{$a->bumn_lengkap}}</td>
        <td>{{$a->periode}}</td>
        <td>{{$a->status}}</td>
        <td>{{$a->saldo_awal}}</td>
        <td>{{$a->income_mitra_binaan}}</td>
        <td>{{$a->income_bumn_pembina_lain}}</td>
        <td>{{$a->income_jasa_adm_pumk}}</td>
        <td>{{$a->income_adm_bank}}</td>
        <td>{{$a->income_total}}</td>
        <td>{{$a->outcome_mandiri}}</td>
        <td>{{$a->outcome_kolaborasi_bumn}}</td>
        <td>{{$a->outcome_bumn_khusus}}</td>
        <td>{{$a->outcome_total}}</td>
        <td>{{$a->saldo_akhir}}</td>
    </tr>
    @endforeach
    
    </table>
    <!-- ************************************************************************** -->
    </body>
    
    </html>
    