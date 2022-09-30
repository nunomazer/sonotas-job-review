@extends('mails.base-layout')

@section('content')
    <table
        class="row row-2" align="center" width="100%" border="0" cellpadding="0" cellspacing="0"
        role="presentation" style="mso-table-lspace:0;mso-table-rspace:0">
        <tbody>
        <tr>
            <td>
                <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0"
                       role="presentation"
                       style="mso-table-lspace:0;mso-table-rspace:0;color:#000;border-radius:0;width:500px"
                       width="500">
                    <tbody>
                    <tr>
                        <td class="column column-1" width="100%"
                            style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:5px;padding-bottom:5px;border-top:0;border-right:0;border-bottom:0;border-left:0">
                            <table class="heading_block block-1" width="100%" border="0" cellpadding="0"
                                   cellspacing="0" role="presentation"
                                   style="mso-table-lspace:0;mso-table-rspace:0">
                                <tr>
                                    <td class="pad" style="width:100%;text-align:center"><h1
                                            style="margin:0;color:#555;font-size:23px;font-family:Arial,Helvetica Neue,Helvetica,sans-serif;line-height:120%;text-align:center;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0">
                                            <span class="tinyMce-placeholder">Teste de email</span></h1></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="row row-3" align="center" width="100%" border="0" cellpadding="0" cellspacing="0"
           role="presentation"
           style="mso-table-lspace:0;mso-table-rspace:0">
        <tbody>
        <tr>
            <td>
                <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0"
                       role="presentation"
                       style="mso-table-lspace:0;mso-table-rspace:0;color:#000;border-radius:0;width:500px"
                       width="500">
                    <tbody>
                    <tr>
                        <td class="column column-1" width="100%"
                            style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:5px;padding-bottom:5px;border-top:0;border-right:0;border-bottom:0;border-left:0">
                            <table class="paragraph_block block-1" width="100%" border="0" cellpadding="10"
                                   cellspacing="0" role="presentation"
                                   style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word">
                                <tr>
                                    <td class="pad">
                                        <div
                                            style="color:#000;font-size:14px;font-family:Arial,Helvetica Neue,Helvetica,sans-serif;font-weight:400;line-height:120%;text-align:left;direction:ltr;letter-spacing:0;mso-line-height-alt:16.8px">
                                            <p style="margin:0">Isto é um teste de envio de email com o template
                                                padrão</p></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="row row-4" align="center" width="100%" border="0" cellpadding="0" cellspacing="0"
           role="presentation"
           style="mso-table-lspace:0;mso-table-rspace:0">
        <tbody>
        <tr>
            <td>
                <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0"
                       role="presentation"
                       style="mso-table-lspace:0;mso-table-rspace:0;color:#000;border-radius:0;width:500px"
                       width="500">
                    <tbody>
                    <tr>
                        <td class="column column-1" width="100%"
                            style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:5px;padding-bottom:5px;border-top:0;border-right:0;border-bottom:0;border-left:0">
                            <table class="divider_block block-1" width="100%" border="0" cellpadding="10"
                                   cellspacing="0" role="presentation"
                                   style="mso-table-lspace:0;mso-table-rspace:0">
                                <tr>
                                    <td class="pad">
                                        <div class="alignment" align="center">
                                            <table border="0" cellpadding="0" cellspacing="0"
                                                   role="presentation" width="100%"
                                                   style="mso-table-lspace:0;mso-table-rspace:0">
                                                <tr>
                                                    <td class="divider_inner"
                                                        style="font-size:1px;line-height:1px;border-top:1px solid #bbb">
                                                        <span>&#8202;</span></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <table class="paragraph_block block-2" width="100%" border="0" cellpadding="10"
                                   cellspacing="0" role="presentation"
                                   style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word">
                                <tr>
                                    <td class="pad">
                                        <div
                                            style="color:#000;font-size:14px;font-family:Arial,Helvetica Neue,Helvetica,sans-serif;font-weight:400;line-height:120%;text-align:left;direction:ltr;letter-spacing:0;mso-line-height-alt:16.8px">
                                            <small style="color: #888888; font-weight: bold;">
                                                Equipe SóNotas
                                                <br/>
                                                <a href="{{ url('/') }}">{{ url('/') }}</a>
                                            </small>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
