    <footer>
        <div class="container">
            <?php if(!isset($_SESSION['login'])){ ?>
                <span class="text-left footer">Telefone: {{telefone}}</span>
                <span class="footer">Endereço: {{endereco}}</span>
            <?php } ?>
        </div>
    </footer>
    
    </div>
    </div>
    <!--<script src="angular/angular.js"></script>-->
    <script src="javascript/main.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAu6rNYe4C_omXFiKMY6DuCk6wgklzLInY&callback=myMap"></script>
</body>
</html>