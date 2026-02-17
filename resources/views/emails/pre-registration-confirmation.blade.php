<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de pré-inscription</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
        }
        .header {
            background: linear-gradient(135deg, #E30613 0%, #B30510 100%);
            padding: 30px 20px;
            text-align: center;
        }
        .header img {
            max-height: 60px;
            width: auto;
        }
        .header h1 {
            color: #ffffff;
            margin: 15px 0 0 0;
            font-size: 24px;
            font-weight: 600;
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }
        .message {
            color: #555;
            margin-bottom: 25px;
        }
        .info-box {
            background-color: #f8f9fa;
            border-left: 4px solid #E30613;
            padding: 20px;
            margin: 25px 0;
            border-radius: 0 8px 8px 0;
        }
        .info-box h3 {
            margin: 0 0 15px 0;
            color: #E30613;
            font-size: 16px;
        }
        .info-row {
            display: flex;
            margin-bottom: 10px;
        }
        .info-label {
            font-weight: 600;
            color: #333;
            width: 140px;
            flex-shrink: 0;
        }
        .info-value {
            color: #555;
        }
        .next-steps {
            background-color: #fff8e1;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }
        .next-steps h3 {
            color: #f57c00;
            margin: 0 0 15px 0;
            font-size: 16px;
        }
        .next-steps ul {
            margin: 0;
            padding-left: 20px;
            color: #555;
        }
        .next-steps li {
            margin-bottom: 8px;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #E30613 0%, #B30510 100%);
            color: #ffffff;
            text-decoration: none;
            padding: 14px 30px;
            border-radius: 8px;
            font-weight: 600;
            margin: 20px 0;
        }
        .footer {
            background-color: #333;
            color: #999;
            padding: 30px;
            text-align: center;
            font-size: 13px;
        }
        .footer a {
            color: #E30613;
            text-decoration: none;
        }
        .social-links {
            margin: 15px 0;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #999;
        }
        .divider {
            height: 1px;
            background-color: #eee;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>COFINA TOGO</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <p class="greeting">Bonjour <strong>{{ $preRegistration->customer_name }}</strong>,</p>

            <p class="message">
                Nous avons bien recu votre demande de pre-inscription et nous vous en remercions.
                Votre dossier a ete enregistre avec succes dans notre systeme.
            </p>

            <!-- Recap des informations -->
            <div class="info-box">
                <h3>Recapitulatif de votre demande</h3>
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 8px 0; font-weight: 600; color: #333; width: 140px;">Produit</td>
                        <td style="padding: 8px 0; color: #555;">{{ $product ? $product->name : 'Non specifie' }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 0; font-weight: 600; color: #333;">Nom</td>
                        <td style="padding: 8px 0; color: #555;">{{ $preRegistration->customer_name }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 0; font-weight: 600; color: #333;">Email</td>
                        <td style="padding: 8px 0; color: #555;">{{ $preRegistration->customer_email }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 0; font-weight: 600; color: #333;">Adresse</td>
                        <td style="padding: 8px 0; color: #555;">{{ $preRegistration->customer_adress }}</td>
                    </tr>
                    @if($preRegistration->receipt_number)
                    <tr>
                        <td style="padding: 8px 0; font-weight: 600; color: #333;">N Recu</td>
                        <td style="padding: 8px 0; color: #555;">{{ $preRegistration->receipt_number }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td style="padding: 8px 0; font-weight: 600; color: #333;">Date</td>
                        <td style="padding: 8px 0; color: #555;">{{ $preRegistration->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>
            </div>

            <!-- Prochaines etapes -->
            <div class="next-steps">
                <h3>Prochaines etapes</h3>
                <ul>
                    <li>Notre equipe va examiner votre dossier dans les plus brefs delais</li>
                    <li>Vous recevrez un appel ou un email pour confirmer votre rendez-vous</li>
                    <li>Presentez-vous a l'agence avec les originaux de vos documents</li>
                </ul>
            </div>

            <div class="divider"></div>

            <p class="message">
                Si vous avez des questions ou besoin d'informations supplementaires,
                n'hesitez pas a nous contacter.
            </p>

            <p style="color: #333;">
                Cordialement,<br>
                <strong>L'equipe COFINA Togo</strong>
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>
                <strong>COFINA Togo</strong><br>
                Votre partenaire financier de confiance
            </p>
            <div class="divider" style="background-color: #555;"></div>
            <p>
                Cet email a ete envoye automatiquement suite a votre pre-inscription.<br>
                Merci de ne pas repondre directement a cet email.
            </p>
            <p style="margin-top: 15px;">
                &copy; {{ date('Y') }} COFINA Togo. Tous droits reserves.
            </p>
        </div>
    </div>
</body>
</html>
