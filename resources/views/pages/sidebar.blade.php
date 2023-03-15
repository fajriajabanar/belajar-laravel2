
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-3 pt-1">
                <ul class="list-unstyled components mb-5">
                <li>
                <a href="/dashboard">Dashboard</a>
                </li>
                 <li>
                <a href="/products">Data</a>
                </li>
                <li>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit">
                          <span class="d-none d-sm-inline mx-1">Logout</span>
                        </button>
                      </form>
	          </li>
	        </ul>
	      </div>
    	</nav>
		

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
