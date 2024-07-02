<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
</head>
<body>
    <h1>Contact Us</h1>
    <p>If you have any questions or feedback, please feel free to contact us.</p>

    <p>Our Office Address:</p>
    <address>
        123 Main Street<br>
        Windhoek West<br>
    </address>

    <p>Phone: <a href="tel:+264814509501">264814509501</a></p>
    <p>Email: <a href="mailto:project@gmail.com"></a>project@gmail.com</p>

    <p>Connect with us on social media:</p>
    <ul>
        <li><a href="https://www.facebook.com/yourpage">Facebook</a></li>
        <li><a href="https://twitter.com/yourpage">Twitter</a></li>
        
    </ul>

    <p>Business Hours:</p>
    <p>Monday - Friday: 9:00 AM - 5:00 PM</p>
    <p>Saturday: 10:00 AM - 2:00 PM</p>
    <p>Sunday: Closed</p>

    <p>Contact Person: Teefkiller</p>
    <p>Fax: 123-456-7891</p>

   
    <form action="contact.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>
        
        <button type="submit">Send Message</button>
    </form>
</body>
</html>