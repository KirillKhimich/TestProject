            <div class="row">
                <div class="col-md-5"><h1 class="my-md-5 my-4">Добавить материал</h1></div>
                <div class="col-md-5 offset-md-2"><h1 class="my-md-5 my-4">Редактировать материал</h1></div>
                <div class="col-lg-5 col-md-5">
                    <form name="createMaterialForm" id="createMaterialForm">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="selectTypeId" id="selectTypeId">
                                <option value="0" selected>Выберите тип</option>
                                <?php foreach ($viewAllTags as $key => $value):?>
                                    <option value="<?=$value['id']?>"><?=$value['typeTitle']?></option>
                                <?php endforeach;?>
                            </select>
                            <label for="floatingSelectType">Тип</label>
                            <div class="invalid-feedback" id="invalidFeedbackType">
                                Пожалуйста, выберите тип
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="selectCategoryId" id="selectCategoryId">
                                <option value="0" selected>Выберите категорию</option>
                                <?php foreach ($viewAllCategories as $key => $value):?>
                                    <option value="<?=$value['id']?>"><?=$value['categoryTitle']?></option>
                                <?php endforeach;?>
                            </select>
                            <label for="selectCategoryId">Категория</label>
                            <div class="invalid-feedback" id="invalidFeedbackCategory">
                                Пожалуйста, выберите категорию
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите название" name="inputMaterialName" id="inputMaterialName">
                            <label for="inputMaterialName">Название</label>
                            <div class="invalid-feedback" id="invalidFeedbackName">
                                Пожалуйста, заполните поле
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите авторов" name="inputMaterialAuthor" id="inputMaterialAuthor">
                            <label for="inputMaterialAuthor">Авторы</label>
                        </div>
                        <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Напишите краткое описание" name="textareaMaterialDescription" id="textareaMaterialDescription"
                              style="height: 100px"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Добавить</button>
                    </form>
                </div>

                <div class="col-lg-5 col-md-5 offset-md-2">
                    <form name="updateMaterialForm" id="updateMaterialForm">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="updateMaterialId" id="updateMaterialId">
                                <option value="0" selected>Выберите Материал</option>
                                <?php foreach ($viewAllMaterials as $key => $value):?>
                                    <option value="<?=$value['id']?>"><?=$value['title']?></option>
                                <?php endforeach;?>
                            </select>
                            <label for="updateMaterialId">Материал</label>
                            <div class="invalid-feedback" id="invalidFeedbackUpdateMaterial">
                                Пожалуйста, выберите материал
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="updateTypeId" id="updateTypeId">
                                <option value="0" selected>Выберите тип</option>
                                <?php foreach ($viewAllTags as $key => $value):?>
                                    <option value="<?=$value['id']?>"><?=$value['typeTitle']?></option>
                                <?php endforeach;?>
                            </select>
                            <label for="updateTypeId">Тип</label>
                            <div class="invalid-feedback" id="invalidFeedbackUpdateType">
                                Пожалуйста, выберите тип
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="updateCategoryId" id="updateCategoryId">
                                <option value="0" selected>Выберите категорию</option>
                                <?php foreach ($viewAllCategories as $key => $value):?>
                                    <option value="<?=$value['id']?>"><?=$value['categoryTitle']?></option>
                                <?php endforeach;?>
                            </select>
                            <label for="updateCategoryId">Категория</label>
                            <div class="invalid-feedback" id="invalidFeedbackUpdateCategory">
                                Пожалуйста, выберите категорию
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите название" name="inputUpdateMaterialName" id="inputUpdateMaterialName">
                            <label for="inputMaterialName">Название</label>
                            <div class="invalid-feedback" id="invalidFeedbackUpdateName">
                                Пожалуйста, заполните поле
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Напишите авторов" name="inputUpdateMaterialAuthor" id="inputUpdateMaterialAuthor">
                            <label for="inputMaterialAuthor">Авторы</label>
                        </div>
                        <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Напишите краткое описание" name="textareaUpdateMaterialDescription" id="textareaUpdateMaterialDescription"
                              style="height: 100px"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Редактировать</button>
                    </form>
                </div>
                </div>

