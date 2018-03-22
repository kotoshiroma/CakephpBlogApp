<div class="paging text-center">
	 <ul class="pagination">
		<li><?php echo $this->Paginator->prev('<  ', array(), null, array('class' => 'prev disabled')); ?></li>
		<li>
			<?php echo $this->Paginator->numbers(array('separator' => '  ',
												 'first' => 1,
												 'last'=> 1)); 
			?>
		</li>
		<li><?php echo $this->Paginator->next('  >', array(), null, array('class' => 'next disabled')); ?></li>				
	</ul>
</div>