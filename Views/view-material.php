        <?php foreach ($viewMaterial as $key => $value) :?>
            <h1 class="my-md-5 my-4"><?=$value['title']?></h1>
            <div class="row mb-3">
                <div class="col-lg-6 col-md-8">
                    <div class="d-flex text-break">
                        <p class="col fw-bold mw-25 mw-sm-30 me-2">Авторы</p>
                        <p class="col"><?php if (!empty($value['author'])){?><?=$value['author']?><?php }else{?>Автор неизвестен<?php }?></p>
                    </div>
                    <div class="d-flex text-break">
                        <p class="col fw-bold mw-25 mw-sm-30 me-2">Тип</p>
                        <p class="col"><?=$value['typeTitle']?></p>
                    </div>
                    <div class="d-flex text-break">
                        <p class="col fw-bold mw-25 mw-sm-30 me-2">Категория</p>
                        <p class="col"><?=$value['categoryTitle']?></p>
                    </div>
                    <div class="d-flex text-break">
                        <p class="col fw-bold mw-25 mw-sm-30 me-2">Описание</p>
                        <p class="col"><?php if (!empty($value['description']))echo $value['description'];else echo "Нет описания"?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form>
                        <h3>Теги</h3>
                        <div class="input-group mb-3">
                            <select class="form-select" id="selectAddTag" aria-label="Добавьте автора">
                                    <option value=<?=$_GET['viewMaterialId'] . "/" ?>0" selected>Выберите тег</option>
                                    <?php foreach ($viewAllTags as $key => $value) :?>
                                            <option value="<?php echo $_GET['viewMaterialId'] . "/".$value['id']?>" ><?=$value['tagsTitle']?></option>
                                    <?php endforeach;?>
                            </select>
                            <button class="btn btn-primary" id="addTagButton" type="button">Добавить</button>
                        </div>
                    </form>
                    <ul class="list-group mb-4">
                        <?php if (!empty($viewMaterialTags)){foreach ($viewMaterialTags as $key => $value):?>
                            <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                <a href="#" class="me-3">
                                    <?=$value['tagsTitle']?>
                                </a>
                                <a href="#" class="text-decoration-none delete"  data-id="viewMaterialTags/<?=$value['id']?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd"
                                              d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </a>
                            </li>
                        <?php endforeach;}else{?>
                            <h4>Теги для этого материала отсутствуют</h4>
                    <?php  }?>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-between mb-3">
                        <h3>Ссылки</h3>
                        <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Добавить</a>
                    </div>
                    <ul class="list-group mb-4">
                       <?php if(!empty($viewAllLinks)){foreach ($viewAllLinks as $key => $value) :?>
                        <li class="list-group-item list-group-item-action d-flex justify-content-between">
                            <a href="<?=$value['link']?>" target="_blank" class="me-3">
                                <?=$value['title']?>
                            </a>
                            <span class="text-nowrap">
                            <a href="#" class="text-decoration-none me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                            </a>
                        <a href="#" class="text-decoration-none delete" data-id="viewMaterialLinks/<?=$value['id']?>" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </a>
                        </span>
                        </li>
                        <?php endforeach;}else{?>
                            <h4>Ссылки для этого материала отстутствуют</h4>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Добавить ссылку</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="addLinksTitle" placeholder="Добавьте подпись"
                               id="addLinksTitle">
                        <label for="floatingModalSignature">Подпись</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Добавьте ссылку" name="addLinksLink" id="addLinksLink">
                        <label for="floatingModalLink">Ссылка</label>
                        <div class="invalid-feedback" id="invalidFeedbackField">
                            Пожалуйста, заполните поле
                        </div>
                        <div class="invalid-feedback" id="invalidFeedbackLink">
                            Поле не является ссылкой
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="materialId" id="materialId" value="" class="btn btn-primary">Добавить</button>
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Закрыть</button>
                </div>
        </div>
    </div>
</div>
        <?php endforeach?>
