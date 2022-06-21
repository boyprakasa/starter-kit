<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="icon" type="image/png" sizes="16x16" href="http://ditakopum.sidoarjokab.go.id/logo.png">
    <title>Dinas Perhubungan - Kabupaten Sidoarjo</title>
</head>

<body style="margin:0px; background: #f8f8f8; ">
    <div width="100%"
        style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
        <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; padding-bottom:30px;" align="center"><a href="#"
                                target="_blank"><img
                                    src="https://upload.wikimedia.org/wikipedia/commons/c/c6/Coat_of_Arms_of_Sidoarjo_Regency.png"
                                    alt="Dinas Perhubungan" style="border:none; width:80px">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="padding: 40px; background: #fff;">
                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                    <tbody>
                        <tr>
                            <td>
                                <center>
                                    <b>
                                        Pengajuan Permohonan di Aplikasi
                                        <span style="color: #009b4c"> Andalalin Dinas Perhubungan</span>.
                                    </b>
                                    <br>dengan rincian sebagai berikut:
                                    <table width="100%"
                                        style="border: 3px dashed rgb(131, 131, 131);border-radius: 10px">
                                        @if ($register)
                                            <tr align="left" valign="top">
                                                <th>No. Register</th>
                                                <th>:</th>
                                                <td>{{ $register }}</td>
                                            </tr>
                                        @endif
                                        <tr align="left" valign="top">
                                            <th width="120px">Pemohon</th>
                                            <th>:</th>
                                            <td>{{ $applicant }}</td>
                                        </tr>
                                        <tr align="left" valign="top">
                                            <th>Jenis Permohonan</th>
                                            <th>:</th>
                                            <td>{{ $service }}</td>
                                        </tr>
                                        <tr align="left" valign="top">
                                            <th>Keterangan</th>
                                            <th>:</th>
                                            <td>{{ $description }}</td>
                                        </tr>
                                    </table>
                                </center>
                                <p>Terima Kasih <br>
                                    <b>Dinas Perhubungan Kabupaten Sidoarjo</b>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
                <p> Powered by
                    <br>
                    <a href="javascript: void(0);" style="color: #b2b2b5; text-decoration: underline;">Dinas Perhubungan
                        Kabupaten Sidoarjo</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
