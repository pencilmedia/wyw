    <ul id="global_nav">
        <li id="logo"><a href="../"><span>Roland P. Garcia</span></a></li>
        <li <?php if ($thisPage=="about") echo " id=\"selected\""; ?> ><a href="/about/" id="nav_about"><span>About</span></a></li>
        <li <?php if ($thisPage=="history") echo " id=\"selected\""; ?> ><a href="/history/" id="nav_history"><span>History</span></a></li>
        <li <?php if ($thisPage=="services") echo " id=\"selected\""; ?> ><a href="/services/" id="nav_services"><span>Services</span></a></li>
        <li <?php if ($thisPage=="contact") echo " id=\"selected\""; ?> class="last"><a href="/contact/" id="nav_contact"><span>Contact</span></a></li>
    </ul>