<!-- ACL / Tag index-->
<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>
<?php echo $this->Html->script('popup', array('inline' => false)); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2 sidebar_mypage">
      <?php echo $this->element('sidebar_mypage'); ?>
    </div>
    <div class="col-sm-10 container-fluid centering">
			<h2 class="table_title"><?php echo __('Tags'); ?></h2>
			<!-- タグ追加のポップアップ領域 -->
			<div class="popup-wrapper --text-align-r">
				<!-- タグ追加ボタン -->
				<?php echo $this->Form->button(__('Add Tag'), array('class' => 'popup-open btn btn-success', 'id' => 'AddTag')); ?>
        <!-- タグ追加ポップアップ -->
        <div class="popup popup--position-2" id="popup-AddTag">
          <div class="floatContainer">
          	<i class="far fa-window-close popup-close-icon"></i>
          </div>

          <?php 
            echo $this->Form->create('Tag', array('url' => array('controller' => 'tags', 'action' => 'add'),'novalidate' => true));
          ?>

            <table>
              <tbody>
                <tr>
                  <th>
                    <?php echo __('Tag'); ?>
                  </th>
                  <td class="text">
                    <?php
                      echo $this->Form->text('tag_name', array('class' => 'input-form input-text input-popup'));
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
      <!-- タグ追加のポップアップ領域(終了) -->

			<div class="table-responsive" style="overflow: visible;">
				<table class="table table-hover">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('tag_name'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($tags as $tag): ?>
						<tr>
							<td>
								<?php echo $this->Html->link($tag['Tag']['tag_name'], array('action' => 'view', $tag['Tag']['id'])); ?>
							</td>
							<td>
								<!-- ポップアップ領域(開始) -->
								<div class="popup-wrapper --inline-block">
									<!-- タグ編集ボタン -->
									<?php
										echo $this->Form->button(__('Edit'), array(
											 'id' => $tag['Tag']['id']
											,'class' => 'popup-open btn btn-primary btn-xs'
											)
										);
									?>
			            <!-- タグ編集ポップアップ -->
				          <div class="popup popup--position-2" id="<?php echo 'popup-'.$tag['Tag']['id']; ?>">
		                <div class="floatContainer">
		                    <i class="far fa-window-close popup-close-icon"></i>
		                </div>

		                <?php 
	                    echo $this->Form->create(
	                      'Tag', 
	                      array(
	                        'url' => array('controller' => 'tags', 'action' => 'edit', $tag['Tag']['id'])
	                        ,'novalidate' => true
	                      )
	                    ); 
		                ?>
	                    <table>
	                      <tbody>
	                        <tr>
	                          <th>
	                              <?php echo __('Tag'); ?>
	                          </th>
	                          <td class="text">
	                            <?php
		                            echo $this->Form->input('id', array('value' => $tag['Tag']['id']));
	                              echo $this->Form->text('tag_name', array(
	                            		 'class' => 'input-form input-text input-popup'
	                            		,'data-tag-name' => $tag['Tag']['tag_name']
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
			          <!-- タグ編集ポップアップ領域(終了) -->
								<?php
									echo $this->Form->postLink(__('Delete')
										, array('action' => 'delete', $tag['Tag']['id'])
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
