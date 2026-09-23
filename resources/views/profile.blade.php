<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            padding: 20px;
            overflow: hidden;
            position: relative;
        }

        .profile-card {
            position: relative;
            z-index: 1;
            width: 420px;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 40px 35px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .profile-photo {
            width: 130px;
            height: 130px;
            margin: 0 auto 25px;
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.25);
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .info-box {
            text-align: left;
            margin-bottom: 14px;
            padding: 16px 20px;
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .info-label {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.5);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 6px;
        }

        .info-value {
            font-size: 16px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
        }

        .footer {
            margin-top: 25px;
            padding-top: 18px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.4);
            font-size: 13px;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>
    <div class="profile-card">
        <div class="profile-photo">
            <img src="{{ asset('Images/ling.png') }}" alt="Profile Photo">
        </div>

        <div class="info-box">
            <div class="info-label">Nama</div>
            <div class="info-value">
                {{ $nama }}
            </div>
        </div>

        <div class="info-box">
            <div class="info-label">Kelas</div>
            <div class="info-value">
                {{ $kelas }}
            </div>
        </div>

        <div class="info-box">
            <div class="info-label">NPM</div>
            <div class="info-value">
                {{ $NPM }}
            </div>
        </div>

        <div class="footer">
            Universitas Lampung
        </div>
    </div>
</body>
</html>