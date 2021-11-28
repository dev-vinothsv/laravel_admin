<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>..:: SGUSA ::..</title>
</head>
<body style="padding:0;margin:0;border:0;font-family:Arial, sans-serif;font-size:13px;font-weight:400;">
<table width="100%" align="center" style="padding:0;margin:0;border:0;font-family:Arial, sans-serif;font-size:13px;font-weight:400;text-align:center;">
<tr>
<td>
<table style="padding:0;border:0;font-family:Arial, sans-serif;font-size:13px;font-weight:400;max-width:700px;width:100%;text-align:left;margin:0 auto;">
    <tr id="container" style="padding:0;margin:0;border:0;">
        <td style="padding:0;margin:0;border:0;">
            <table width="100%" align="left" style="padding:0;margin:0;border:0;font-family:Arial, sans-serif;font-size:13px;font-weight:400;">
                <tr>
                    <td style="background-color:#3BA798;padding:10px;margin:0;border:0;color:#FFF;">
                        <h3 style="padding:12px 0;margin:0;font-size:18px;font-weight:600;">Admin Notification</h3>
                    </td>
                </tr>
                <tr>
                    <td style="background-color:#EDEDEE;padding:2px 10px;margin:0;border:0;color:#333;">
                        <div style="display:block;min-height:300px;">
                            <p style="padding:8px 0;margin:0;font-size:13px;font-weight:400;line-height:24px;text-align:justify;">Environment: {{$env_name}}</p>
                            <p style="padding:8px 0;margin:0;font-size:13px;font-weight:400;line-height:24px;text-align:justify;">Module: {{$module}}</p>
<p style="padding:8px 0;margin:0;font-size:13px;font-weight:400;line-height:24px;text-align:justify;">Next Notifiction: {{$component_pref/4}} hours (Login to change this.) If this error continues, you will not be notified again for another {{$component_pref/4}} hours </p>

        @foreach ($errors as $error) 
                            <p style="padding:8px 0;margin:0;font-size:13px;font-weight:400;line-height:24px;">{{ $error }}  </p>
        @endforeach
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr id="footer" style="padding:0;margin:0;border:0;">
        <td style="background-color:#1A1C1C;text-align:center;margin:0;border-top:5px solid #099EB6;"><p>&nbsp;</p></td>
    </tr>
</table>
</td>
</tr>
</table>
</body>
</html>
