
<nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar navbar-inverse navbar-fixed-top Start -->
    <div class="navbar-header" style="height: 60px"><!-- navbar-header Start -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!-- navbar-toggle Start -->
            
            <span class="sr-only">Toggle Navigation</span>
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button><!-- navbar-toggle finish -->
        
        <a href="index.php?dashboard" class="navbar-brand fs-2 fw-bold text-uppercase" style="margin-top: 7px; margin-left: 50px; color: #fff" >LK Industrial</a>
    </div><!-- navbar-header finish -->

    <ul class="nav navbar-right top-nav"><!-- nav navbar-right top-nav Start --> 
        <li class="dropdown"><!-- dropdown Start -->
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- dropdown-toggle Start -->
                
                <i class="fa fa-user"></i>
                
            </a><!-- dropdown-toggle finish -->
            
            <ul class="dropdown-menu"><!-- dropdown-menu Start -->
                <li><!-- li Start -->
                    <a href="#"><!-- a href Start index.php?user_profile=2 php echo $admin_id;  -->
                        
                        <i class="fa fa-fw fa-user"></i> Profile
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li><!-- li Start -->
                    <a href="index.php?view_products"><!-- a href Start -->
                        
                        <i class="fa fa-fw fa-envelope"></i> Transactions
                        
                        <span class="badge">99</span> <!-- li Start $count_products; -->
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li><!-- li Start -->
                    <a href="index.php?view_customers"><!-- a href Start -->
                        
                        <i class="fa fa-fw fa-users"></i> Parts Inventory
                        
                        <span class="badge"> 99</span> <!-- li Start $count_customers; -->
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li><!-- li Start -->
                    <a href="index.php?view_cats"><!-- a href Start -->
                        
                        <i class="fa fa-fw fa-gear"></i> Customers
                        
                        <span class="badge">50</span> <!-- li Start $count_p_categories;-->
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li class="divider"></li>
                
                <li><!-- li Start -->
                    <a href="logout.php"><!-- a href Start -->
                        
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
            </ul><!-- dropdown-menu finish -->
            
        </li><!-- dropdown finish -->
        
    </ul><!-- nav navbar-right top-nav finish -->
    <div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse Start -->
        <ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Start -->
            <li><!-- li Start -->
                <a href="index.php?dashboard"><!-- a href Start -->
                        
                        <i class="fa fa-fw fa-dashboard"></i> Dashboard
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->

           <li><!-- li Start -->
               <a href="#" data-toggle="collapse" data-target="#transactions"><!-- a href Start -->

                    <i class="fa fa-fw fa-bar-chart"></i> Transactions
                    <i class="fa fa-fw fa-caret-down"></i>

                    </a><!-- a href finish -->

                     <ul id="transactions" class="collapse"><!-- collapse Start -->

                    <li><!-- li Start -->
                        <a href="index.php?productsTrans"> Products </a>  <!-- Di pa sure dis, ibahin nalang href if need-->
                    </li><!-- li finish -->

                    <li><!-- li Start -->
                        <a href="index.php?servicesTrans"> Services </a>
                    </li><!-- li finish -->

                </ul><!-- collapse finish -->

            </li><!-- li finish -->
            

            <li><!-- li Start -->
                <a href="#" data-toggle="collapse" data-target="#products"><!-- a href Start -->
                        
                        <i class="fa fa-fw fa-tag"></i> Parts Inventory
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="products" class="collapse"><!-- collapse Start -->
                    <li><!-- li Start -->
                        <a href="index.php?insert_parts"> Insert Product </a>
                    </li><!-- li finish -->
                    <li><!-- li Start -->
                        <a href="index.php?view_parts"> View Product </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li Start -->
                <a href="#" data-toggle="collapse" data-target="#p_cat"><!-- a href Start -->
                        
                        <i class="fa fa-fw fa-edit"></i> Product Categories
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="p_cat" class="collapse"><!-- collapse Start -->
                    <li><!-- li Start -->
                        <a href="index.php?insert_cat"> Insert Product Categories </a>
                    </li><!-- li finish -->
                    <li><!-- li Start -->
                        <a href="index.php?view_cats"> View Product Categories </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li Start -->
                <a href="#" data-toggle="collapse" data-target="#cat"><!-- a href Start -->
                        
                        <i class="fa fa-fw fa-book"></i> Services
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="cat" class="collapse"><!-- collapse Start -->
                    <li><!-- li Start -->
                        <a href="index.php?insert_service"> Insert Services </a>
                    </li><!-- li finish -->
                    <li><!-- li Start -->
                        <a href="index.php?view_services"> View Services </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->

              <li><!-- li Start -->
                        

            <li><!-- li Start -->
                <a href="index.php?view_customers">
                <i class="fa fa-fw fa-users"></i> View Customers
            </a> 
            </li><!-- li finish -->    

    </li> <!-- li finish -->
         
    <li><!-- li Start -->
        <a href="#" data-toggle="collapse" data-target="#users"><!-- a href Start -->
                
                <i class="fa fa-fw fa-users"></i> Users
                <i class="fa fa-fw fa-caret-down"></i>
                
        </a><!-- a href finish -->
        
        <ul id="users" class="collapse"><!-- collapse Start -->
            <li><!-- li Start -->
                <a href="index.php?insert_user"> Insert User </a>
            </li><!-- li finish -->
            <li><!-- li Start -->
                <a href="index.php?view_users"> View Users </a>
            </li><!-- li finish -->
           
        </ul><!-- collapse finish -->
        
    </li><!-- li finish -->
    
    <li><!-- li Start -->
        <a href="logout.php"><!-- a href Start -->
            <i class="fa fa-fw fa-power-off"></i> Log Out
        </a><!-- a href finish -->
    </li><!-- li finish -->
            
        </ul><!-- nav navbar-nav side-nav finish -->
    </div><!-- collapse navbar-collapse navbar-ex1-collapse finish -->   
</nav><!-- navbar navbar-inverse navbar-fixed-top finish -->