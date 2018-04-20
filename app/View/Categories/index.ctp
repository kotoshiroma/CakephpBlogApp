<!-- ACL / categories index -->
<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>
<?php echo $this->Html->script('popup', array('inline' => false)); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 sidebar_mypage">
            <?php echo $this->element('sidebar_mypage'); ?>
        </div>
        <div class="col-sm-10 container-fluid centering">
			<h2 class="table_title"><?php echo __('Categories'); ?></h2>

			<!-- カテゴリー追加のポップアップ領域(開始) -->
			<div class="popup-wrapper --text-align-r">
				<!-- カテゴリー追加ボタン -->
				<?php echo $this->Form->button(__('Add Category'), array('class' => 'popup-open btn btn-success', 'id' => 'AddCategory')); ?>
        <!-- カテゴリー追加ポップアップ -->
        <div class="popup popup--position-2" id="popup-AddCategory">
          <div class="floatContainer">
              <i class="far fa-window-close popup-close-icon"></i>
          </div>

          <?php 
            echo $this->Form->create('Category', array('url' => array('controller' => 'categories', 'action' => 'add'), 'novalidate' => true));
          ?>
            <table>
              <tbody>
                <tr>
                  <th>
                    <?php echo __('Category'); ?>
                  </th>
                  <td class="text">
                    <?php
                      echo $this->Form->text('category_name', array('class' => 'input-form input-text input-popup'));
                    ?>
                  </td>
                </tr>
                <tr class="submit">
                  <td colspan="2" align="center">
                     <?php echo $this->Form->button(__('Add'), array('class' => 'btn btn-success btn_m submit-popup', 'disabled' => true)); ?>
                  </td>
                </tr>
              </tbody>
            </table>
          <?php echo $this->Form->end(); ?>
        </div>
    	</div>
      <!-- カテゴリー追加ポップアップ領域(終了) -->

			<div class="table-responsive" style="overflow: visible;">
				<table class="table table-border table-striped table-hover">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('category_name'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($categories as $category): ?>
						<tr>
							<td>
								<?php echo $this->Html->link($category['Category']['category_name'], array('action' => 'view', $category['Category']['id'])); ?>
							</td>
							<td>
								<!-- ポップアップ領域(開始) -->
								<div class="popup-wrapper --inline-block --text-align-r">
									<!-- カテゴリー編集ボタン -->
									<?php
										echo $this->Form->button(__('Edit'), array(
											 'id' => $category['Category']['id']
											,'class' => 'popup-open btn btn-primary btn-xs'
											)
										);
									?>

			            <!-- カテゴリー編集ポップアップ -->
			            <div class="popup popup--position-2" id="<?php echo 'popup-'.$category['Category']['id']; ?>">
		                <div class="floatContainer">
		                  <i class="far fa-window-close popup-close-icon"></i>
		                </div>

		                <?php 
	                    echo $this->Form->create(
                        'Category', 
                        array(
                           'url' => array('controller' => 'categories', 'action' => 'edit', $category['Category']['id'])
                          ,'novalidate' => true
                        )
	                    ); 
		                ?>
	                    <table>
                        <tbody>
                          <tr>
                            <th>
                              <?php echo __('Category'); ?>
                            </th>
                            <td class="text">
                              <?php
                              	echo $this->Form->input('id', array('value' => $category['Category']['id']));
                                echo $this->Form->text('category_name', array(
                                	 'class' => 'input-form input-text input-popup'
                                	,'data-category-name' => $category['Category']['category_name']
                                	)
                              	);
                              ?>
                            </td>
                          </tr>
                          <tr class="submit">
                            <td colspan="2" align="center">
                              <?php echo $this->Form->button(__('Change'), array('class' => 'btn btn-primary btn_m submit-popup', 'disabled' => false)); ?>
                            </td>
                          </tr>
                        </tbody>
	                    </table>
			              <?php echo $this->Form->end(); ?>
			            </div>
								</div>
						    <!-- カテゴリー追加ポップアップ領域(終了) -->
								<?php
									echo $this->Form->postLink(__('Delete')
										, array('action' => 'delete', $category['Category']['id'])
										, array('class' => 'btn btn-warning btn-xs')
										, '削除してよろしいですか？'
									);
								?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			
			<?php echo $this->element('pagination') ?>
        </div>
    </div>
</div>
