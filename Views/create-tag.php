            <div class="row">
                <div class="col-md-5"><h1 class="my-md-5 my-4">Добавить тег</h1></div>
                <div class="col-md-5 offset-md-2"><h1 class="my-md-5 my-4">Редактировать тег</h1></div>
                <div class="col-lg-5 col-md-5">
                    <form method="post" action="" id="createTagForm">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="createTag" placeholder="Напишите название" id="createTag">
                            <label for="floatingName">Название</label>
                            <div class="invalid-feedback">
                                Пожалуйста, заполните поле
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Добавить</button>
                    </form>
                </div>


                <div class="col-lg-5 col-md-5 offset-md-2">
                    <form id="formUpdateTag" action="">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="selectUpdateTag" name="selectUpdateTag" aria-label="Добавьте автора">
                                <option value="0" selected>Выберите тег</option>
                                <?php foreach ($allTags as $key => $value):?>
                                    <option value="<?=$value['id']?>"><?=$value['tagsTitle']?></option>
                                <?php endforeach;?>
                            </select>
                            <label for="selectUpdateTag">Название</label>
                            <div class="invalid-feedback" id="updateInvalidSelectTag">Пожалуйста выберите тег
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите название" id="inputUpdateTag" name="inputUpdateTag">
                            <label for="inputUpdateTag">Изменить название</label>
                            <div class="invalid-feedback" id="updateInvalidInputTag">
                                Пожалуйста, заполните поле
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Редактировать</button>
                    </form>
                </div>
            </div>
            </div>