<!doctype html>
 <?= $this->Html->css(['template/verifier.css']) ?>
<html>
  <head>
    <title>blockchain-certificate demo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, user-scalable=yes">
    <script src="/cert-web-component/bower_components/webcomponentsjs/webcomponents-lite.js"></script>

    <link rel="import" href="/cert-web-component/bower_components/iron-demo-helpers/demo-pages-shared-styles.html">
    <link rel="import" href="/cert-web-component/bower_components/iron-demo-helpers/demo-snippet.html">

    <link rel="import" href="/cert-web-component/blockchain-certificate.html">
    <link rel="import" href="/cert-web-component/validate-certificate.html">

    <style is="custom-style" include="demo-pages-shared-styles">
    </style>
  </head>
  <body>
    <div class="certificate-container">
      <div class="blockchain-certificate">
        <validate-certificate>
          <blockchain-certificate href="/cert-web-component/JSON/verify.json"></blockchain-certificate>
        </validate-certificate>
      </div>
    </div>
  </body>
</html>
