<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to {{ $appName }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 20px;
            text-align: center;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .content {
            padding: 40px 30px;
        }

        .greeting {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .intro-text {
            font-size: 14px;
            color: #666;
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .credentials-section {
            background-color: #f9f9f9;
            border-left: 4px solid #667eea;
            padding: 20px;
            margin: 30px 0;
            border-radius: 4px;
        }

        .credentials-section h3 {
            font-size: 14px;
            font-weight: 700;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 15px;
        }

        .credential-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .credential-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .credential-label {
            font-size: 12px;
            font-weight: 700;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }

        .credential-value {
            font-size: 15px;
            color: #333;
            font-family: 'Monaco', 'Courier New', monospace;
            word-break: break-all;
            background-color: #ffffff;
            padding: 8px 10px;
            border-radius: 3px;
            border: 1px solid #e0e0e0;
        }

        .security-note {
            background-color: #fff3cd;
            border: 1px solid #ffc107;
            color: #856404;
            padding: 12px 15px;
            border-radius: 4px;
            font-size: 13px;
            margin-top: 20px;
        }

        .security-note strong {
            display: block;
            margin-bottom: 5px;
        }

        .cta-section {
            text-align: center;
            margin: 30px 0;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 40px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            font-size: 14px;
            transition: transform 0.2s;
        }

        .cta-button:hover {
            transform: translateY(-2px);
        }

        .footer-section {
            background-color: #f5f5f5;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e0e0e0;
        }

        .footer-text {
            font-size: 12px;
            color: #999;
            margin-bottom: 10px;
            line-height: 1.6;
        }

        .footer-links {
            font-size: 12px;
            margin-top: 15px;
        }

        .footer-links a {
            color: #667eea;
            text-decoration: none;
            margin: 0 10px;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        .divider {
            height: 1px;
            background-color: #e0e0e0;
            margin: 20px 0;
        }

        @media only screen and (max-width: 600px) {
            .email-container {
                margin: 0;
                border-radius: 0;
            }

            .content {
                padding: 20px 15px;
            }

            .header {
                padding: 30px 15px;
            }

            .header h1 {
                font-size: 24px;
            }

            .greeting {
                font-size: 16px;
            }

            .cta-button {
                display: block;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>🎉 Welcome!</h1>
            <p>to {{ $appName }}</p>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="greeting">Hello {{ $user->name }},</div>

            <div class="intro-text">
                <p>Your account has been successfully created on <strong>{{ $appName }}</strong>. We're excited to have you on board! Below are your login credentials:</p>
            </div>

            <!-- Credentials Section -->
            <div class="credentials-section">
                <h3>📧 Your Login Credentials</h3>

                <div class="credential-item">
                    <div class="credential-label">Email (Username)</div>
                    <div class="credential-value">{{ $user->email }}</div>
                </div>

                <div class="credential-item">
                    <div class="credential-label">Password</div>
                    <div class="credential-value">{{ $plainPassword }}</div>
                </div>
            </div>

            <div class="security-note">
                <strong>🔒 Security Reminder:</strong>
                Please keep your credentials safe and change your password immediately after logging in. Never share your password with anyone.
            </div>

            <!-- CTA Button -->
            <div class="cta-section">
                <a href="{{ $appUrl }}/login" class="cta-button">Sign In to Your Account</a>
            </div>

            <div class="intro-text">
                <p>If you have any questions or need assistance, our support team is here to help. Don't hesitate to reach out!</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer-section">
            <div class="footer-text">
                <strong>{{ $appName }}</strong><br>
                Thank you for being part of our community!
            </div>

            <div class="divider"></div>

            <div class="footer-text">
                This is an automated message. Please do not reply to this email.
            </div>

            <div class="footer-links">
                <a href="{{ $appUrl }}/privacy">Privacy Policy</a>
                <a href="{{ $appUrl }}/terms">Terms of Service</a>
                <a href="mailto:support@example.com">Contact Support</a>
            </div>

            <div class="footer-text" style="margin-top: 15px; font-size: 11px; color: #bbb;">
                © {{ date('Y') }} {{ $appName }}. All rights reserved.
            </div>
        </div>
    </div>
</body>
</html>
