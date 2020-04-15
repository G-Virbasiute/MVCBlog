<div class='sticky'>
    <div style="border-top: 2px solid black; border-bottom: 2px solid black; background-color: #d3c1e6 ">    
        <nav class="navbar navbar-expand-lg navbar-light" style=" font-family: 'Amatic SC', cursive; font-size: 30px; left: 32%;">
            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="?">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?controller=post&action=readAll">Tutorials</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </a>
                            <div class="dropdown-menu" style="width: 200px; height: 250px; "aria-labelledby="navbarDropdownMenuLink">
                                <table>
                                    <?php foreach ($categories as $category): ?>
                                        <tr>
                                            <td><a class="dropdown-item" href="?controller=post&action=readCategory&id= <?= $category['CategoryID'] ?>" style="font-size: 30px;"><?= $category['Category'] ?></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Members Portal
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?PHP
                                // only display menu options if user is logged in
                                if (!isset($_SESSION["loggedin"])) {
                                    echo '<a class="dropdown-item" href="?controller=user&action=createUser" style="font-size: 30px;">Sign up</a>';
                                    echo '<a class="dropdown-item" href="?controller=user&action=authUser" style="font-size: 30px;">Log in</a>';
                                }
                                // only display menu options if user is logged in
                                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                                    echo '<a class="dropdown-item" href="?controller=user&action=logOut" style="font-size: 30px;">Log out</a>';
                                    echo '<a class="dropdown-item" href="?controller=dashboard&action=read" style="font-size: 30px;">Your dashboard</a>';
                                }
                                ?>
                            </div>
                        </li>
                        <li class="navitem">
                            <div class="search-container">
                                <form action="searchLink.php" method="GET">
                                    <input type='text' name='search'>
                                    <button type="submit">Submit</a></button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
</div>