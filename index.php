<?php

$quotes = ["There is something in every one of you that waits and listens for the sound of 
the genuine in yourself. It is the only true guide you will ever have. 
And if you cannot hear it, you will all of your life spend your days on the ends of 
strings that somebody else pulls. - Howard Thurman", "
All gods are homemade, and it is we who pull their strings, and so, give them the power to 
pull ours. - Aldous Huxley", "The essence of strategy is choosing what not to do. - Michael Porter",
"One cannot and must not try to erase the past merely because it does not fit the present. -Golda Meir", "Patriotism means to stand by the country. 
It does not mean to stand by the president. -Theodore Roosevelt", "Death is something inevitable. When a man has done what he considers to be his duty to his people and his country, he can rest in peace. I believe I have made that effort and that is, therefore, why I will sleep for the eternity.
- Nelson Mandela", "Weak people revenge. Strong people forgive. Intelligent People Ignore.
- Albert Einstein", "A mind is like a parachute. It doesn't work if it is not open.
- Frank Zappa", "Never be afraid to raise your voice for honesty and truth and compassion against injustice and lying and greed. If people all over the world...would do this, it would change the earth.
- William Faulkner", "The difference between stupidity and genius is that genius has its limits.
- Albert Einstein", "With or without religion, you would have good people doing good things and evil people doing evil things. But for good people to do evil things, that takes religion.
- Steven Weinberg", "Human kindness has never weakened the stamina or softened the fiber of a free people. A nation does not have to be cruel to be tough.
- Franklin D. Roosevelt", "A person who never made a mistake never tried anything new.
- Albert Einstein"];

$randomquote = $quotes[array_rand($quotes)];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $newQuote = $_POST["quote"];

    $quotes[] = $newQuote;

    file_put_contents("quotes.txt", implode("\n", $quotes), LOCK_EX);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Quote Generator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" >
        <h1>Random Quote Generator</h1>

        <div class="quote">
            <p><?php echo $randomquote; ?></p>
        </div>

        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="quote">Add a quote:</label>
            <input type="text" id="quote" name="quote" required>
            <button type="submit">Add Quote</button>
        </form>
    </div>
</body>
</html>