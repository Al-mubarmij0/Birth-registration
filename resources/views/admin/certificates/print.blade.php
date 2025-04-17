<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Certificate of Registration</title>
    <style>
        @page {
            size: A4;
            margin: 20mm;
        }

        body {
            font-family: 'Times New Roman', serif;
            margin: 0;
            padding: 0;
            background: #fff;
        }

        .certificate-box {
            width: 100%;
            max-width: 850px;
            margin: auto;
            padding: 40px;
            border: 10px double #000;
            box-sizing: border-box;
            page-break-after: avoid;
        }

        .certificate-title {
            font-size: 34px;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .subtitle {
            font-size: 18px;
            text-align: center;
            margin-bottom: 30px;
        }

        .certificate-body {
            font-size: 16px;
            line-height: 1.7;
            margin: 0 auto;
            padding: 0 10px;
        }

        .certificate-body p {
            margin: 6px 0;
        }

        .field-label {
            font-weight: bold;
            display: inline-block;
            width: 240px;
        }

        .footer {
            margin-top: 50px;
            text-align: right;
            padding-right: 40px;
        }

        .signature-line {
            margin-top: 60px;
            border-top: 1px solid #000;
            width: 250px;
            margin-left: auto;
        }

        .issued-date {
            text-align: left;
            font-size: 14px;
            padding-top: 30px;
        }

        .logo {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo img {
            max-height: 80px;
        }

        @media print {
            .no-print {
                display: none;
            }

            body {
                margin: 0;
            }

            .certificate-box {
                border: none;
                box-shadow: none;
            }
        }

        .print-btn {
            display: block;
            margin: 30px auto;
            padding: 10px 25px;
            font-size: 16px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

    </style>
</head>
<body>

<div class="certificate-box">
    <div class="logo">
        {{-- Optional: Insert logo --}}
        {{-- <img src="{{ asset('images/logo.png') }}" alt="Logo"> --}}
    </div>

    <div class="certificate-title">Certificate of Registration</div>
    <div class="subtitle">This certifies that the following individual has been duly registered</div>

    <div class="certificate-body">
        <p><span class="field-label">Full Name:</span> {{ strtoupper($registration->surname) }} {{ strtoupper($registration->first_name) }}</p>
        <p><span class="field-label">Date of Birth:</span> {{ \Carbon\Carbon::parse($registration->date_of_birth)->format('d F Y') }}</p>
        <p><span class="field-label">Gender:</span> {{ ucfirst($registration->gender) }}</p>
        <p><span class="field-label">Place of Birth:</span> {{ $registration->place_of_birth }}</p>

        <p><span class="field-label">Father's Name:</span> {{ $registration->father_name }}</p>
        <p><span class="field-label">Father's Occupation:</span> {{ $registration->father_occupation }}</p>

        <p><span class="field-label">Mother's Name:</span> {{ $registration->mother_name }}</p>
        <p><span class="field-label">Mother's Occupation:</span> {{ $registration->mother_occupation }}</p>

        <p><span class="field-label">Registration Center:</span> {{ $registration->registration_center }}</p>
        <p><span class="field-label">State:</span> {{ $registration->state }}</p>
        <p><span class="field-label">Local Government Area (LGA):</span> {{ $registration->lga }}</p>

        <p><span class="field-label">Registration Date:</span> {{ \Carbon\Carbon::parse($registration->registration_date)->format('d F Y') }}</p>
    </div>

    <div class="issued-date">
        <strong>Certificate Issued On:</strong> {{ now()->format('d F Y') }}
    </div>

    <div class="footer">
        <div class="signature-line"></div>
        <p>Authorized Signature</p>
    </div>
</div>

{{-- Print Button --}}
<button class="no-print print-btn" onclick="window.print()">Print Certificate</button>

</body>
</html>
