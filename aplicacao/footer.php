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
    <script src="angular/main.js"></script>
</body>
</html>