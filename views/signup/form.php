<?php
echo("  <form  method='post' action='/signup/create' enctype='multipart/form-data'>
      <h2>Register</h2>
      <label>Email</label>
      <input type='email' name='email' placeholder='Email' required><br>
      <label>Password</label>
      <input type='password' name='password' placeholder='Password' required><br>
      <section id='termsOfUse'>
        <input type='checkbox' required>
        <p>J'accepte les termes</p>
        <a href='/termsofuses'>conditions d'utilisation</a>
      </section>
      <input type='submit'Register</input>
      <label><a href='/signin'><b>Se connecter</b></a></label>
    </form>");