
            <h1 class="my-md-5 my-4">Добавить материал</h1>
            <div class="row">
                <div class="col-lg-5 col-md-8">
                    <form name="createMaterialForm" id="createMaterialForm">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="selectTypeId" id="selectTypeId">
                                <option value="typeId/0" selected>Выберите тип</option>
                                <?php foreach ($viewAllTags as $key => $value):?>
                                    <option value="tagId/<?=$value['id']?>"><?=$value['typeTitle']?></option>
                                <?php endforeach;?>
                            </select>
                            <label for="floatingSelectType">Тип</label>
                            <div class="invalid-feedback" id="invalid-feedback-tag">
                                Пожалуйста, выберите значение
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="selectCategoryId" id="selectCategoryId">
                                <option value="categoryId/0" selected>Выберите категорию</option>
                                <?php foreach ($viewAllCategories as $key => $value):?>
                                    <option value="categoryId/<?=$value['id']?>"><?=$value['categoryTitle']?></option>
                                <?php endforeach;?>
                            </select>
                            <label for="floatingSelectCategory">Категория</label>
                            <div class="invalid-feedback" id="invalid-feedback-category">
                                Пожалуйста, выберите значение
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите название" name="inputMaterialName" id="inputMaterialName">
                            <label for="floatingName">Название</label>
                            <div class="invalid-feedback" id="invalid-feedback-name">
                                Пожалуйста, заполните поле
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите авторов" name="inputMaterialAuthor" id="inputMaterialAuthor">
                            <label for="floatingAuthor">Авторы</label>
                        </div>
                        <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Напишите краткое описание" name="textareaMaterialDescription" id="textareaMaterialDescription"
                              style="height: 100px"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Добавить</button>
                    </form>
                </div>
                </div>

