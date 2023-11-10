<!DOCTYPE html>
<html lang="en" data-app-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $context['title'] ?? "Application Runtime Error" ?> - Error Tree</title>
  <style>
    .anim-shake {
      -webkit-animation: anim-shake 300ms ease-in-out;
      animation: anim-shake 300ms ease-in-out
    }

    @-webkit-keyframes anim-shake {

      0%,
      100% {
        margin-left: 0
      }

      20%,
      80% {
        margin-left: -15px
      }

      40%,
      60% {
        margin-left: 15px
      }
    }

    @keyframes anim-shake {

      0%,
      100% {
        margin-left: 0
      }

      20%,
      80% {
        margin-left: -15px
      }

      40%,
      60% {
        margin-left: 15px
      }
    }

    .anim-spin {
      -webkit-animation: anim-spin 1000ms linear infinite;
      animation: anim-spin 1000ms linear infinite
    }

    @-webkit-keyframes anim-spin {
      to {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg)
      }
    }

    @keyframes anim-spin {
      to {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg)
      }
    }

    .anim-grow {
      -webkit-animation: anim-grow 600ms ease;
      animation: anim-grow 600ms ease
    }

    .anim-grow.infinite {
      -webkit-animation-iteration-count: infinite;
      animation-iteration-count: infinite
    }

    @-webkit-keyframes anim-grow {
      100% {
        -webkit-transform: scale(2.5);
        transform: scale(2.5);
        color: aqua
      }
    }

    @keyframes anim-grow {
      100% {
        -webkit-transform: scale(2.5);
        transform: scale(2.5);
        color: aqua
      }
    }

    :root {
      --hsl-clr-warning: 29, 100%, 67%;
      --hsl-clr-primary: 257, 80%, 40%;
      --hsl-clr-danger: 334, 100%, 67%;
      --hsl-clr-success: 146, 90%, 52%;
      --hsl-clr-bg: 231, 15%, 25%;
      --hsl-clr-bg-l: 231, 15%, 28%;
      --hsl-clr-white: 0, 0%, 100%;
      --hsl-clr-white-l: 240, 20%, 97%;
      --hsl-clr-dark: 240, 29%, 17%;
      --hsl-clr-light: 0, 0%, 100%;
      --hsl-clr-text-muted: 213, 16%, 56%;
      --clr-warning: hsl(var(--hsl-clr-warning));
      --clr-primary: hsl(var(--hsl-clr-primary));
      --clr-danger: hsl(var(--hsl-clr-danger));
      --clr-success: hsl(var(--hsl-clr-success));
      --clr-pink: hsl(var(--hsl-clr-pink));
      --clr-brown: hsl(13, 43%, 15%);
      --clr-bg: hsl(var(--hsl-clr-bg));
      --clr-bg-l: hsl(var(--hsl-clr-bg-l));
      --clr-white: hsl(var(--hsl-clr-white));
      --clr-white-l: hsl(var(--hsl-clr-white-l));
      --clr-dark: hsl(var(--hsl-clr-dark));
      --clr-light: hsl(var(--hsl-clr-light));
      --clr-text-muted: hsl(var(--hsl-clr-text-muted));
      --gradient-text: linear-gradient(89.98deg, var(--clr-warning) 6.84%, var(--clr-success) 20%);
      --gradient-bar: linear-gradient(103.22deg, #ae67fa -13.84%, #ff8a71);
      --fs-h1: 5.2rem;
      --fs-h2: 4.2rem;
      --fs-h3: 2.4rem;
      --fs-h4: 2.2rem;
      --fs-h5: 1.8rem;
      --fs-p: 1.8rem;
      --fs-main: 1.8rem;
      --border-light: 2px solid hsla(var(--hsl-clr-bg), 0.3);
      --transition: all 350ms ease;
      --bs: 0.25em 0.25em 0.75em hsla(0, 0%, 0%, 0.25), 0.125em 0.125em 0.25em hsla(0, 0%, 0%, 0.15)
    }

    [data-app-theme=default],
    [data-app-theme=dark] {
      --hsl-clr-bg: 0, 0%, 100%;
      --hsl-clr-bg-l: 240, 20%, 97%;
      --hsl-clr-white: 231, 15%, 25%;
      --hsl-clr-white-l: 231, 15%, 28%;
      --clr-bg: hsl(var(--hsl-clr-bg));
      --clr-white: hsl(var(--hsl-clr-white));
      --clr-bg-l: hsl(var(--hsl-clr-bg-l));
      --clr-white-l: hsl(var(--hsl-clr-white-l));
      --bs: 0.25em 0.25em 0.75em hsla(0, 0%, 0%, 0.25), 0.125em 0.125em 0.25em hsla(0, 0%, 0%, 0.15);
      --bs-2: 0 0 0.75em hsla(0, 0%, 0%, 0.25), 0 0 0.25em hsla(0, 0%, 0%, 0.15);
      --bs-pri: 0.25em 0.25em 1.5em hsla(0, 0%, 0%, 0.3), 0em 0em 0.5em hsla(0, 0%, 0%, 0.35);
      --bs-sec: 0.5rem 0.1rem 2rem hsl(0deg 0% 76.22% / 14%)
    }

    *,
    *::before,
    *::after {
      margin: 0;
      padding: 0;
      outline: 0;
      text-decoration: none;
      -webkit-box-sizing: border-box;
      box-sizing: border-box
    }

    html {
      font-size: 62.5%;
      scroll-behavior: smooth;
      line-height: 1.3
    }

    body {
      font-family: "Poppins", sans-serif;
      background-color: var(--clr-white-l);
      color: var(--clr-bg);
      overflow-x: hidden;
      font-weight: 500;
      font-size: var(--fs-main)
    }

    h1 {
      font-size: var(--fs-h1);
      line-height: var(--fs-h1)
    }

    h2 {
      font-size: var(--fs-h2);
      line-height: var(--fs-h2)
    }

    h3 {
      font-size: var(--fs-h3);
      line-height: var(--fs-h3)
    }

    h4 {
      font-size: var(--fs-h4);
      line-height: var(--fs-h4)
    }

    h5 {
      font-size: var(--fs-h5);
      line-height: var(--fs-h5)
    }

    p {
      font-size: var(--fs-p)
    }

    .container-x {
      width: 95%;
      padding-inline: .5rem;
      max-width: 1024px;
      margin: auto
    }

    .section-p {
      padding-block: 60px
    }

    .input:active,
    .input:focus,
    input:focus,
    textarea:focus,
    select:focus,
    input:active,
    textarea:active,
    select:active {
      -webkit-box-shadow: 0 0 1px 3px hsla(var(--hsl-clr-danger), 0.5);
      box-shadow: 0 0 1px 3px hsla(var(--hsl-clr-danger), 0.5);
      border-color: var(--clr-warning)
    }

    .input,
    input,
    select,
    textarea {
      background-color: rgba(0, 0, 0, 0);
      width: 100%;
      border-radius: .3em;
      color: var(--clr-bg);
      border: 2px solid hsla(var(--hsl-clr-bg), 0.5);
      padding: .45em .6em
    }

    li {
      display: block;
      list-style: none
    }

    textarea {
      resize: none;
      min-height: 80px
    }

    input[type=radio],
    input[type=checkbox] {
      width: -webkit-max-content;
      width: -moz-max-content;
      width: max-content;
      margin: 0 10px
    }

    select {
      background-color: var(--clr-white)
    }

    button {
      border: none;
      background: rgba(0, 0, 0, 0);
      color: inherit;
      font: inherit;
      cursor: pointer;
      -webkit-transform: var(--transition);
      transform: var(--transition)
    }

    a {
      color: inherit;
      display: inline-block
    }

    a.underline:hover {
      text-decoration: underline
    }

    a:active,
    a:focus,
    button:active,
    button:active {
      outline: 1px solid var(--clr-primary);
      outline-offset: 2px
    }

    img {
      max-width: 100%;
      max-height: 100%
    }

    h2,
    h3 {
      line-height: 1.2;
      margin: 0
    }

    .padd {
      padding: 5px
    }

    .error-tree {
      position: fixed;
      inset: 0;
      overflow: auto;
      background-color: var(--clr-dark);
    }

    .error-tree__head {
      color: var(--clr-light);
      font-weight: bold;
      background: var(--gradient-bar);
      padding: 1rem;
      border-radius: 5px;
      margin-bottom: 1rem
    }

    .error-tree__body {
      padding: 1rem;
      border-radius: 5px;
      margin-bottom: 2rem;
      border: 2px solid var(--clr-text-muted)
    }

    .error-tree__body tr,
    .error-tree__body td {
      vertical-align: top
    }

    .error-tree__body td {
      padding: .3em;
      padding-right: 1rem
    }

    .error-tree__body tr {
      padding-bottom: 2rem
    }

    .error-tree__body tr.head {
      font-weight: 800
    }

    .error-tree__body .spacer {
      background-color: #000;
      height: 2px
    }

    .error-tree__body .spacer td {
      padding: 0
    }

    .error-tree .error .error-tree__footer {
      text-align: center
    }

    a {
      color: var(--clr-warning)
    }
  </style>
</head>

<body>
  <main class="error-tree">
    <!-- ERROR -->
    <section class="container-x  section-p error">
      <div class="error-tree__head">
        <?= $context['title'] ?? "Application Runtime Error" ?>
      </div>
      <div class="error-tree__body">
        <table>
          <tbody>

            <?php
            foreach ($context as $key => $value) { ?>
              <tr>
                <td><?= ucfirst($key) ?></td>
                <td><?= $value ?></td>
              </tr>
              <tr class='spacer'>
                <td colSpan='100'></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="error-tree__footer">
        <small><b>--- ErrorTree ---</b></small>
      </div>
    </section>

    <!-- RESOURCES -->
    <section class="container-x  section-p resources">
      <div class="error-tree__head">
        Available Resources
      </div>
      <div class="error-tree__body">
        <table>
          <tbody>
            <tr class="head">
              <td>Resource</td>
              <td>Link</td>
            </tr>
            <!-- Resources -->
            <tr>
              <td>Router</td>
              <td><a href="">https://www...com</a> </td>
            </tr>
            <tr class='spacer'>
              <td colSpan='100'></td>
            </tr>

            <tr>
              <td>ORM Models</td>
              <td><a href="">https://www...com</a> </td>
            </tr>
            <tr class='spacer'>
              <td colSpan='100'></td>
            </tr>

            <tr>
              <td>CLI Tool</td>
              <td><a href="">https://www...com</a> </td>
            </tr>
            <tr class='spacer'>
              <td colSpan='100'></td>
            </tr>

          </tbody>
        </table>
      </div>
    </section>
  </main>
</body>

</html>