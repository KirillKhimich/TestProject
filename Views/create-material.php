
            <h1 class="my-md-5 my-4">Добавить материал</h1>
            <div class="row">
                <div class="col-lg-5 col-md-8">
                    <form name="createMaterialForm" id="createMaterialForm">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="selectTagId">
                                <option value="0" selected>Выберите тип</option>
                                <?php foreach ($viewAllTags as $key => $value):?>
                                    <option value="tagId/<?=$value['id']?>"><?=$value['tagsTitle']?></option>
                                <?php endforeach;?>
                            </select>
                            <label for="floatingSelectType">Тип</label>
                            <div class="invalid-feedback">
                                Пожалуйста, выберите значение
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="selectCategoryId">
                                <option value="0" selected>Выберите категорию</option>
                                <?php foreach ($viewAllCategories as $key => $value):?>
                                    <option value="categoryId/<?=$value['id']?>"><?=$value['categoryTitle']?></option>
                                <?php endforeach;?>
                            </select>
                            <label for="floatingSelectCategory">Категория</label>
                            <div class="invalid-feedback">
                                Пожалуйста, выберите значение
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите название" id="inputMaterialInput">
                            <label for="floatingName">Название</label>
                            <div class="invalid-feedback">
                                Пожалуйста, заполните поле
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите авторов" id="floatingAuthor">
                            <label for="floatingAuthor">Авторы</label>
                            <div class="invalid-feedback">
                                Пожалуйста, заполните поле
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Напишите краткое описание" id="floatingDescription"
                              style="height: 100px"></textarea>
                            <label for="floatingDescription">Описание</label>
                            <div class="invalid-feedback">
                                Пожалуйста, заполните поле
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Добавить</button>
                    </form>
                </div>
                </div>

