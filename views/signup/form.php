<?php
echo("  
  <body class='form-body'>
      <form class='form-form' method='post' action='/signup/create' enctype='multipart/form-data'>
          <h2 class='form-title'>Register</h2>
          <label class='form-label'>Email</label>
          <input class='form-input' type='email' name='email' placeholder='Email' required><br>
          <label class='form-label'>Password</label>
          <input class='form-input' type='password' minlength='12' name='password' placeholder='Password' required><br>
          <p>  Le mot de passe doit être composé de 12 caractères minimum dont : <br>
               - Une majuscule <br>
               - Un chiffre <br>  
               - Un caractère spéciale<br>
           </p>
          <section id='termsOfUse'>
            <p>J'accepte les termes</p>
            <input type='checkbox' required>
            <a href='/termsofuses'>conditions d'utilisation</a>
          </section>
          <input class='form-input' type='submit' value='Register'</input>
          <label class='form-label'><a href='/signin'><b>Dejà un compte ?</b></a></label>
        </form>
    </body>
    ");