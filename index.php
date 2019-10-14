<?php
    include('get_tweet.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
        integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script src="script.js"></script>
    <title>Twitter APP</title>
</head>

<body class="bg-primary">
    <nav class="navbar navbar-expand-sm navbar-dark bg-white sticky-top border-bottom" id="main-nav">
        <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href = '../index.html';">Back
            to portfolio</button>
        <div class="container text-primary">
            <span class="h4">Twitter APP</span>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-primary" href="#tweet">Tweet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="#read">Read Tweets</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- WRITE TWEETS -->
    <div class="container searchContainer h-100" id="tweet">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="form-group col-md">
                <div class="h1 text-white">Tweet</div>
                <form class="form-inline" method="post" action="tweet.php">
                    <input class="form-control col-lg" type="text" name="tweet" placeholder="What's on your mind?">
                    <div class="input-group-append">
                        <input type="submit" class="btn btn-secondary btn-send" value="SEND">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- READ TWEETS -->
    <div class="container" id="read">
        <?php 
            $tweets = $_SESSION['tweets'];
        ?>
        <div class="h1 text-white">Read Tweets</div>
    </div>

    <div style="margin-top:50px;"></div>

    <nav id="year" class="navbar navbar-nav fixed-bottom navbar-dark bg-secondary text-white"></nav>

    <!-- SCRIPTS -->

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
    </script>

    <script>

        //get tweets for 'read tweets' section
        let tweets = <?php echo json_encode($tweets);?> 
        displayTweets(tweets);

        // Get the current year for the copyright
        $('#year').text("Zach Nelson ©" + new Date().getFullYear());

        $('body').scrollspy({
            target: '#main-nav'
        });

        // Add smooth scrolling
        $('#main-nav a').on('click', function (e) {
            // Check for a hash value
            if (this.hash !== '') {
                // Prevent default behavior
                e.preventDefault();

                // Store hash
                const hash = this.hash;

                // Animate smooth scroll
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function () {
                    // Add hash to URL after scroll
                    window.location.hash = hash;
                });
            }
        });
    </script>
</body>

</html>