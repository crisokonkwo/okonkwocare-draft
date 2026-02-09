# reCAPTCHA v3 Setup Instructions

## ✅ What's Already Done

1. ✅ Contact form handler configured to send emails to: **crisokonkwo@gmail.com**
2. ✅ reCAPTCHA v3 verification added to form submission
3. ✅ JavaScript script auto-loads on contact page
4. ✅ Form automatically generates tokens on submit
5. ✅ Server-side verification with score threshold (0.5+)

## 🔑 What You Need to Do

You need to add your reCAPTCHA v3 **Secret Key** to complete the setup.

### Step 1: Get Your reCAPTCHA v3 Keys

If you don't have them yet:

1. Go to: https://www.google.com/recaptcha/admin
2. Sign in with your Google account
3. Click **"+"** to register a new site
4. Fill in:
   - **Label**: Okonkwo Care Pediatrics
   - **reCAPTCHA type**: Select **"reCAPTCHA v3"**
   - **Domains**: Add your domain(s):
     - `okonkwocarepediatrics.com`
     - `localhost` (for testing)
   - Accept the terms
5. Click **Submit**
6. Copy both keys:
   - **Site Key** (already in your form HTML)
   - **Secret Key** (you need to add this)

### Step 2: Add Your Secret Key

Open `functions.php` and find line ~120:

```php
define('RECAPTCHA_SITE_KEY', '6Lc6lGQsAAAAAMGOGxr5xw7BknFx2TDA7gD6joCc');
define('RECAPTCHA_SECRET_KEY', 'YOUR_SECRET_KEY_HERE'); // Replace this!
```

Replace `YOUR_SECRET_KEY_HERE` with your actual Secret Key from Google.

**Example:**
```php
define('RECAPTCHA_SECRET_KEY', '6Lc6lGQsAAAAABcdefgh12345SecretKeyExample');
```

### Step 3: Verify Site Key in Form

Your form already has the Site Key, but make sure it matches:

```html
<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response" value="">
```

The JavaScript will automatically populate this field when the form is submitted.

### Step 4: Test the Form

1. Go to your contact page
2. Fill out the form completely
3. Click "Send message"
4. You should:
   - See the form submit without a visible CAPTCHA (v3 is invisible)
   - Get redirected to `/new/thank-you`
   - Receive an email at crisokonkwo@gmail.com

## 🔍 How It Works

### reCAPTCHA v3 Flow:

1. **Page Load**: Google reCAPTCHA script loads automatically
2. **Form Submit**: JavaScript intercepts the submit
3. **Token Generation**: Google generates a unique token (score 0.0-1.0)
4. **Form Submission**: Token added to hidden field, form submits to server
5. **Server Verification**: WordPress verifies token with Google
6. **Score Check**: If score ≥ 0.5, form processes; otherwise, rejected
7. **Email Sent**: Email goes to crisokonkwo@gmail.com
8. **Redirect**: User sent to thank-you page

### Score Threshold:

Current setting: **0.5** (moderate security)
- 0.0 = Definitely a bot
- 0.5 = Likely human (current threshold)
- 1.0 = Definitely human

You can adjust this in `functions.php` around line ~165:
```php
return $score >= 0.5; // Change 0.5 to desired threshold
```

## 🐛 Troubleshooting

### Form doesn't submit
- Check browser console for JavaScript errors
- Verify Site Key is correct in the form HTML
- Make sure you're on the contact page

### "reCAPTCHA verification failed" error
- Check that Secret Key is added to functions.php
- Verify Secret Key is correct (no extra spaces)
- Check error logs for reCAPTCHA score

### Email not received
- Check spam folder
- Verify email address is crisokonkwo@gmail.com in functions.php (line ~157)
- Check WordPress mail is working (test with another form)

### How to check reCAPTCHA scores
Enable WordPress debug logging in `wp-config.php`:
```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
```

Then check `wp-content/debug.log` after form submissions to see scores.

## 📧 Email Configuration

Current recipient: **crisokonkwo@gmail.com**

To change the email recipient, edit `functions.php` around line ~157:
```php
$to = 'crisokonkwo@gmail.com'; // Change this email
```

## 🔒 Security Features

✅ reCAPTCHA v3 bot protection  
✅ Email validation  
✅ Field sanitization  
✅ CSRF protection via WordPress nonce (recommended to add)  
✅ Required field validation  
✅ Acknowledgement checkbox required  

## 📝 Form Fields Captured

The email will include:
- First Name
- Last Name
- Email
- Phone
- Topic (dropdown selection)
- Number of Children
- Message
- Acknowledgement text

## Next Steps

1. Add your Secret Key to functions.php
2. Test the form on your live site
3. Check that emails arrive at crisokonkwo@gmail.com
4. Monitor reCAPTCHA scores in debug.log if needed
5. Adjust score threshold if you get too many false positives/negatives

---

**Need help?** Check the error logs or contact support with the reCAPTCHA score from the logs.
