<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>Retroflix - Locações de Filme</title>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700&amp;display=swap">
<link rel="stylesheet" href="../../assets/fonts/font-awesome.min.css">
<style>
  body {
    overflow-x: hidden;
    background: #fcfbfb !important;
  }

  nav {
    background: black !important;
  }

  .sbx-twitter {
    display: inline-block;
    position: relative;
    width: 200px;
    height: 33px;
    white-space: nowrap;
    box-sizing: border-box;
    font-size: 12px;
  }

  .sbx-twitter__wrapper {
    width: 100%;
    height: 100%;
  }

  .sbx-twitter__input {
    display: inline-block;
    -webkit-transition: box-shadow .4s ease, background .4s ease;
    transition: box-shadow .4s ease, background .4s ease;
    border: 0;
    border-radius: 17px;
    box-shadow: inset 0 0 0 1px #E1E8ED;
    background: #F5F8FA;
    padding: 0;
    padding-right: 52px;
    padding-left: 16px;
    width: 100%;
    height: 100%;
    vertical-align: middle;
    white-space: normal;
    font-size: inherit;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
  }

  .sbx-twitter__input::-webkit-search-decoration,
  .sbx-twitter__input::-webkit-search-cancel-button,
  .sbx-twitter__input::-webkit-search-results-button,
  .sbx-twitter__input::-webkit-search-results-decoration {
    display: none;
  }

  .sbx-twitter__input:hover {
    box-shadow: inset 0 0 0 1px #c1d0da;
  }

  .sbx-twitter__input:focus,
  .sbx-twitter__input:active {
    outline: 0;
    box-shadow: inset 0 0 0 1px #D6DEE3;
    background: #FFFFFF;
  }

  .sbx-twitter__input::-webkit-input-placeholder {
    color: #9AAEB5;
  }

  .sbx-twitter__input::-moz-placeholder {
    color: #9AAEB5;
  }

  .sbx-twitter__input:-ms-input-placeholder {
    color: #9AAEB5;
  }

  .sbx-twitter__input::placeholder {
    color: #9AAEB5;
  }

  .sbx-twitter__submit {
    position: absolute;
    top: 0;
    right: 0;
    left: inherit;
    margin: 0;
    border: 0;
    border-radius: 0 16px 16px 0;
    background-color: rgba(62, 130, 247, 0);
    padding: 0;
    width: 33px;
    height: 100%;
    vertical-align: middle;
    text-align: center;
    font-size: inherit;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  .sbx-twitter__submit::before {
    display: inline-block;
    margin-right: -4px;
    height: 100%;
    vertical-align: middle;
    content: '';
  }

  .sbx-twitter__submit:hover,
  .sbx-twitter__submit:active {
    cursor: pointer;
  }

  .sbx-twitter__submit:focus {
    outline: 0;
  }

  .sbx-twitter__submit svg {
    width: 13px;
    height: 13px;
    vertical-align: middle;
    fill: #657580;
  }

  .sbx-twitter__reset {
    display: none;
    position: absolute;
    top: 7px;
    right: 33px;
    margin: 0;
    border: 0;
    background: none;
    cursor: pointer;
    padding: 0;
    font-size: inherit;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    fill: rgba(0, 0, 0, 0.5);
  }

  .sbx-twitter__reset:focus {
    outline: 0;
  }

  .sbx-twitter__reset svg {
    display: block;
    margin: 4px;
    width: 11px;
    height: 11px;
  }

  .sbx-twitter__input:valid~.sbx-twitter__reset {
    display: block;
    -webkit-animation-name: sbx-reset-in;
    animation-name: sbx-reset-in;
    -webkit-animation-duration: .15s;
    animation-duration: .15s;
  }

  @-webkit-keyframes sbx-reset-in {
    0% {
      -webkit-transform: translate3d(-20%, 0, 0);
      transform: translate3d(-20%, 0, 0);
      opacity: 0;
    }

    100% {
      -webkit-transform: none;
      transform: none;
      opacity: 1;
    }
  }

  @keyframes sbx-reset-in {
    0% {
      -webkit-transform: translate3d(-20%, 0, 0);
      transform: translate3d(-20%, 0, 0);
      opacity: 0;
    }

    100% {
      -webkit-transform: none;
      transform: none;
      opacity: 1;
    }
  }

  .searchbar {
    display: flex;
    align-items: center;
  }
</style>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="77">
  <nav class="navbar navbar-light navbar-expand-md fixed-top" id="mainNav">
    <div class="container"><a class="navbar-brand text-light" style="font-weight: 500;" href="#">RETROFLIX</a><button data-bs-toggle="collapse" class="navbar-toggler navbar-toggler-right" data-bs-target="#navbarResponsive" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" value="Menu"><i class="fa fa-bars"></i></button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item nav-link"></li>
          <li class="nav-item nav-link"><a class="nav-link text-light" style="font-weight: 500;" href="/filmes/cart/">CARRINHO</a></li>
          <li class="nav-item nav-link"><a class="nav-link text-light" style="font-weight: 500;" href="/cliente/minha-conta/">MINHA CONTA</a></li>
          <div class="searchbar">
            <svg xmlns="http://www.w3.org/2000/svg" style="display:none">
              <symbol xmlns="http://www.w3.org/2000/svg" id="sbx-icon-search-8" viewBox="0 0 40 40">
                <path d="M16 32c8.835 0 16-7.165 16-16 0-8.837-7.165-16-16-16C7.162 0 0 7.163 0 16c0 8.835 7.163 16 16 16zm0-5.76c5.654 0 10.24-4.586 10.24-10.24 0-5.656-4.586-10.24-10.24-10.24-5.656 0-10.24 4.584-10.24 10.24 0 5.654 4.584 10.24 10.24 10.24zM28.156 32.8c-1.282-1.282-1.278-3.363.002-4.643 1.282-1.284 3.365-1.28 4.642-.003l6.238 6.238c1.282 1.282 1.278 3.363-.002 4.643-1.283 1.283-3.366 1.28-4.643.002l-6.238-6.238z" fill-rule="evenodd" />
              </symbol>
              <symbol xmlns="http://www.w3.org/2000/svg" id="sbx-icon-clear-3" viewBox="0 0 20 20">
                <path d="M8.114 10L.944 2.83 0 1.885 1.886 0l.943.943L10 8.113l7.17-7.17.944-.943L20 1.886l-.943.943-7.17 7.17 7.17 7.17.943.944L18.114 20l-.943-.943-7.17-7.17-7.17 7.17-.944.943L0 18.114l.943-.943L8.113 10z" fill-rule="evenodd" />
              </symbol>
            </svg>

            <form novalidate="novalidate" onsubmit=" true;" class="searchbox sbx-twitter" action="">
              <div role="search" class="sbx-twitter__wrapper">
                <input type="search" name="pesquisa" placeholder="Encontre seu filme" autocomplete="off" required="required" class="sbx-twitter__input">
                <button type="submit" title="Submit your search query." class="sbx-twitter__submit">
                  <svg role="img" aria-label="Search">
                    <use xlink:href="#sbx-icon-search-8"></use>
                  </svg>
                </button>
                <button type="reset" title="Clear the search query." class="sbx-twitter__reset">
                  <svg role="img" aria-label="Reset">
                    <use xlink:href="#sbx-icon-clear-3"></use>
                  </svg>
                </button>
              </div>
            </form>
            <script type="text/javascript">
              document.querySelector('.searchbox [type="reset"]').addEventListener('click', function() {
                this.parentNode.querySelector('input').focus();
              });
            </script>

          </div>
        </ul>
      </div>
    </div>
  </nav>