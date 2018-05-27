<div class="modal" <?= isset($errors) ? '' : 'hidden' ?> id="task_add">
  <button class="modal__close" type="button" name="button" href="/">Закрыть</button>

  <h2 class="modal__heading">Добавление задачи</h2>

  <form class="form" action="./index.php" method="post" enctype="multipart/form-data">
    <div class="form__row">
      <label class="form__label" for="name">Название <sup>*</sup></label>
      <input class="form__input <?= isset($errors['name']) ? 'form__input--error' : '' ?>" type="text" name="name" id="name" value="" placeholder="Введите название">
    <?php if (isset($errors['name'])): ?>
        <p class="form__message"><?= $errors['name'] ?></p>
    <?php endif; ?>
    </div>

    <div class="form__row">
      <label class="form__label" for="project">Проект <sup>*</sup></label>

      <select class="form__input form__input--select <?= isset($errors['project']) ? 'form__input--error' : '' ?>" name="project" id="project">
        <option value="" selected>Выберите проект</option>
      <?php foreach ($categories as $value ): ?>
          <option value="<?= $value['project_id']?>"><?= $value['project_name']?></option>
      <?php endforeach; ?>
      </select>
      <?php if (isset($errors['project'])): ?>
        <p class="form__message"><?= $errors['project'] ?></p>
    <?php endif; ?>
    </div>

    <div class="form__row">
      <label class="form__label" for="date">Срок выполнения</label>

      <input class="form__input form__input--date" type="text" name="date" id="date"
             placeholder="Введите дату и время">
    </div>

    <div class="form__row">
      <label class="form__label" for="preview">Файл</label>

      <div class="form__input-file">
        <input class="visually-hidden" type="file" name="preview" id="preview" value="">

        <label class="button button--transparent" for="preview">
            <span>Выберите файл</span>
        </label>
      </div>
    </div>

    <div class="form__row form__row--controls">
      <input class="button" type="submit" name="" value="Добавить">
    </div>
  </form>
</div>
