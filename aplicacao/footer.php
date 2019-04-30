    <footer>
        <div class="container">
        <div class="smalll">
            <?php if(!isset($_SESSION['login'])){ ?>
                <span class="text-left footer">Telefone: {{telefone}}</span>
                <span class="footer">Endereço: {{endereco}}</span>
            <?php } ?>
        </div>
        </div>
    </footer>
    
    </div>
    <!--<script src="angular/angular.js"></script>-->
    <script src="angular/main.js"></script>
</body>
</html>