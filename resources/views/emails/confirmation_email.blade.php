@extends('layouts.emails')
@section('content')
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tbody><tr>
            <td bgcolor="#efe9e5">
                <table width="620" border="0" cellspacing="0" cellpadding="0" align="center" class="scale">
                    <tbody><tr>
                        <td bgcolor="#FFFFFF">

                            <table width="540" border="0" cellspacing="0" cellpadding="0" align="center" class="agile1 scale">
                                <tbody><tr>
                                    <td class="agile-main" style="font-family:Bell Gothic Std; color: #005792; font-size: 22px;">

                                        Votre demande de participation est accepté</td>
                                </tr>
                                <tr><td height="12" style="font-size: 1px;">&nbsp;</td></tr>
                                <tr>
                                    <td class="w3l-p2" style="font-family: Candara, sans-serif; color: #7f8c8d; font-size: 18px; line-height: 28px;">
                                        vous avez déposé une demande de participation à notre prochain évènnement “{{ $event->abbreviation }}”.<br>
                                        nous vous informons que le comité a accepté votre demande.
                                    </td>
                                </tr>
                                <tr><td class="wls-5h" height="60">&nbsp;</td></tr>
                                </tbody>
                            </table>

                        </td>
                    </tr>
                    </tbody>
                </table>

            </td>
        </tr>
        </tbody>
    </table>

    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tbody><tr>
            <td bgcolor="#efe9e5">
                <table width="620" border="0" cellspacing="0" cellpadding="0" align="center" class="scale">
                    <tbody><tr>
                        <td bgcolor="#005792">

                            <table class="scale-center-both1" width="300" border="0" cellspacing="0" cellpadding="0" align="left">
                                <tbody>
                                <tr>
                                    <td class="center-w3">
                                        <table class="center-img" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                                            <tbody><tr><td class="img-w3" height="24">&nbsp;</td></tr>
                                            <tr>
                                                <td>
                                                    <img class="intr2" src="{{ route('welcome')}}{{$event->sliders->first()->name }}" border="0" style="display: block; max-width: 275px; height:230px; border-top-right-radius: 8px; border-bottom-right-radius: 8px;" alt="" width="275" editable="true">
                                                </td>
                                            </tr>
                                            <tr><td class="h1" height="24">&nbsp;</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="scale-center-both2" width="300" border="0" cellspacing="0" cellpadding="0" align="right">
                                <tbody><tr>
                                    <td>
                                        <table width="245" border="0" cellspacing="0" cellpadding="0" class="scale">
                                            <tbody><tr><td class="agile-h" height="54">&nbsp;</td></tr>
                                            <tr>
                                                <td class="w3layouts-1" align="center" style="font-family:'Candara', sans-serif; color: #fefefe; font-size: 20px; line-height: 35px;">
                                                    {{ $event->title }}. <br>
                                                </td>
                                            </tr>
                                            <tr><td class="bu-w3l3" height="36">&nbsp;</td></tr>
                                            <tr>
                                                <td align="center" class="go-agile">
                                                    <a href="{{ route('event', $event->id) }}" style="font-family:'Candara', sans-serif; color: #fefefe; font-size: 16px; text-decoration: none; background-color: #005792; padding: 12px 26px 13px 26px; border-radius: 4px; border: 2px solid #FFFFFF;">Voir en details</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="wls-6h" height="60" bgcolor="#FFFFFF">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
