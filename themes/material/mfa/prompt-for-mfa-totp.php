<!DOCTYPE html>
<html>
<head>
    <title><?= $this->t('{material:mfa:title}') ?></title>

    <?php include __DIR__ . '/../common-head-elements.php' ?>
</head>
<body class="gradient-bg">
<div class="mdl-layout mdl-layout--fixed-header fill-viewport">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">
                <?= $this->t('{material:mfa:header}') ?>
            </span>
        </div>
    </header>
    <main class="mdl-layout__content" layout-children="column">
        <form layout-children="column" method="POST">
            <?php
            foreach ($this->data['formData'] as $name => $value) {
            ?>
            <input type="hidden" name="<?= htmlentities($name); ?>"
                   value="<?= htmlentities($value); ?>"/>
            <?php
            }
            ?>
            <div class="mdl-card mdl-shadow--8dp">
                <div class="mdl-card__media white-bg margin" layout-children="column">
                    <img src="/module.php/material/mfa-totp-app.svg"
                         alt="<?= $this->t('{material:mfa:totp_icon}') ?>">
                </div>

                <div class="mdl-card__title center">
                    <h1 class="mdl-card__title-text">
                        <?= $this->t('{material:mfa:totp_header}') ?>
                    </h1>
                </div>

                <div class="mdl-card__title center" >
                    <p class="mdl-card__subtitle-text">
                        <?= $this->t('{material:mfa:totp_instructions}') ?>
                    </p>
                </div>

                <div class="mdl-card__supporting-text" layout-children="column">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <label for="mfaSubmission" class="mdl-textfield__label">
                            <?= $this->t('{material:mfa:totp_input}') ?>
                        </label>
                        <input name="mfaSubmission" class="mdl-textfield__input" autofocus
                               id="mfaSubmission"/>
                    </div>
                </div>

                <?php
                $message = $this->data['errorMessage'];

                if (! empty($message)) {
                ?>
                <div class="mdl-card__supporting-text" layout-children="column">
                    <p class="mdl-color-text--red error">
                        <i class="material-icons">error</i>

                        <span class="mdl-typography--caption">
                            <?= htmlentities($message) ?>
                        </span>
                    </p>
                </div>

                <script>
                    ga('send','event','error','totp','<?= $message ?>');
                </script>
                <?php
                }
                ?>

                <div class="mdl-card__actions" layout-children="row">
                    <span flex></span>
                    <button name="submitMfa"
                            class="mdl-button mdl-button--raised mdl-button--primary">
                        <?= $this->t('{material:mfa:button_verify}') ?>
                    </button>
                </div>

                <div layout-children="column" child-spacing="center">
                    <?php include __DIR__ . '/other_mfas.php' ?>
                </div>
            </div>

            <div>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                    <span class="mdl-checkbox__label">
                        <?= $this->t('{material:mfa:remember_this}') ?>
                    </span>
                    <input type="checkbox" name="rememberMe" checked class="mdl-checkbox__input"/>
                </label>
            </div>
        </form>
    </main>
</div>
</body>
</html>
