<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Reseña Recibida</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f3f4f6; font-family: Arial, sans-serif;">

    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%"
        style="background-color: #f3f4f6; padding: 20px;">
        <tr>
            <td align="center">

                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600"
                    style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); overflow: hidden;">

                    <tr>
                        <td align="center" style="padding: 40px 0 20px 0; background-color: #ffffff;">
                            <img src="{{ asset('img/Logo_G.webp') }}" alt="Logo Empresa" width="150"
                                style="display: block; border: 0;">
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 0 40px 40px 40px; text-align: center;">
                            <h1 style="color: #1f2937; font-size: 24px; margin-bottom: 20px;">¡Un cliente agregó un
                                comentario!</h1>

                            <p style="color: #4b5563; font-size: 16px; line-height: 24px; margin-bottom: 30px;">
                                Hemos recibido una nueva reseña en el sistema. Por favor, verifica el contenido y toma
                                las acciones necesarias.
                            </p>

                            <a href="{{ url('https://blueoceanaccountax.com/admin/review?status=0') }}"
                                style="display: inline-block; background-color: #f08121; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 6px; font-weight: bold; font-size: 16px;">
                                Ver Reseña
                            </a>

                            <p style="margin-top: 30px; font-size: 12px; color: #9ca3af;">
                                ¿No funciona el botón? Copia y pega este enlace:<br>
                                <a href="{{ url('https://blueoceanaccountax.com/admin/review?status=0') }}"
                                    style="color: #f08121;">{{ url('https://blueoceanaccountax.com/admin/review?status=0') }}</a>
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td
                            style="background-color: #f9fafb; padding: 20px; text-align: center; font-size: 12px; color: #6b7280;">
                            &copy; {{ date('Y') }} Nombre de tu Empresa. Todos los derechos reservados.
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>

</body>

</html>
