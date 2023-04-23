    <nav>
        <a href="index.php" class="navbar-brand  primary-color"> <img src="img/logo.png" alt=""> </a>
        <div class="navbar-item">
            <ul class="navbar-nav ml-auto">
                <li class="<?php if($page=='index'){echo 'active';}?>">
                    <a href="index.php" class="nav-link text-capitalize">Home</a>
                </li>
                <li class="<?php if($page=='about'){echo 'active';}?>">
                    <a href="about.php" class="nav-link text-capitalize"> About</a>
                </li>
                <li class="<?php if($page=='contact'){echo 'active';}?>">
                    <a href="contact.php" class="nav-link text-capitalize"> Contact</a>
                </li>
                <li class="<?php if($page=='live'){echo 'active';}?>">
                    <a href="livetrack.php" class="nav-link text-capitalize"> Live Tracker</a>
                </li>
                <li class="nav-sign">
                    <a href="sign-in.php" class="nav-link text-capitalize"> Sign In </a>
                </li>
            </ul>
        </div>
    </nav>