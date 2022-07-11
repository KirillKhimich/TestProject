            <div class="row">

                <div class="col-md-5"><h1 class="my-md-5 my-4">Добавить категорию</h1></div>
                <div class="col-md-5 offset-md-2"><h1 class="my-md-5 my-4">Редактировать категорию</h1></div>

                <div class="col-lg-5 col-md-5">
                    <form id="createCategoryForm" action="">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите название" id="createCategory" name="createCategory">
                            <label for="floatingName">Название</label>
                            <div class="invalid-feedback">
                                Пожалуйста, заполните поле
                            </div>
                        </div>
                        <button class="btn btn-primary" id="addCategory" type="submit">Добавить</button>
                    </form>
                </div>

                <div class="col-lg-5 col-md-5 offset-md-2">
                    <form id="formUpdateCategory" action="">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="selectUpdateCategory" name="selectUpdateCategory" aria-label="Добавьте автора">
                                <option value="0" selected>Выберите категорию</option>
                                <?php foreach ($allCategories as $key => $value):?>
                                    <option value="<?=$value['id']?>"><?=$value['categoryTitle']?></option>
                                <?php endforeach;?>
                            </select>
                            <label for="selectUpdateCategory">Название</label>
                            <div class="invalid-feedback" id="updateInvalidSelectCategory">Пожалуйста выберите категорию
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите название" id="inputUpdateCategory" name="inputUpdateCategory">
                            <label for="inputUpdateCategory">Изменить название</label>
                            <div class="invalid-feedback" id="updateInvalidInputCategory">
                                Пожалуйста, заполните поле
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Редактировать</button>
                    </form>
                </div>
            </div>
