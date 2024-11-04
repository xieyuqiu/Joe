<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit;
}
?>
<aside class="joe_aside">

	<?php if ($this->options->JArticle_Guide == 'on' && ($this->is('post') || $this->is('page'))) : ?>
		<section class="joe_aside__item posts-nav-box">
			<div class="joe_aside__item-title">
				<span class="text">文章目录</span>
			</div>
			<div class="joe_aside__item-contain">
				<div class="posts-nav-lists">
					<ul class="bl nav"></ul>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<section class="joe_aside__item author">
		<img width="100%" height="120" class="image lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?= $this->options->JAside_Author_Image ?? Joe\theme_url('assets/images/aside_author_image.jpg'); ?>" alt="博主栏壁纸" />
		<div class="user">
			<img width="75" height="75" class="avatar lazyload" src="<?php joe\getAvatarLazyload(); ?>" data-src="<?php $this->options->JAside_Author_Avatar ? $this->options->JAside_Author_Avatar() : joe\getAvatarByMail($this->authorId ? $this->author->mail : $this->user->mail) ?>" alt="博主头像" />
			<a class="link" target="_blank" href="<?php $this->options->JAside_Author_Link() ?>" rel="noopener noreferrer nofollow"><?php $this->options->JAside_Author_Nick ? $this->options->JAside_Author_Nick() : ($this->authorId ? $this->author->screenName() : $this->user->screenName()); ?></a>
			<p class="motto joe_motto"></p>
		</div>
		<?php Typecho_Widget::widget('Widget_Stat')->to($item); ?>
		<div class="count">
			<div class="item" title="累计文章数">
				<span class="num"><?php echo number_format($item->publishedPostsNum); ?></span>
				<span>文章数</span>
			</div>
			<div class="item" title="累计评论数">
				<span class="num"><?php echo number_format($item->publishedCommentsNum); ?></span>
				<span>评论量</span>
			</div>
		</div>
		<?php if ($this->options->JAside_Author_Nav !== "off") : ?>
			<ul class="list"><?php joe\getAsideAuthorNav() ?></ul>
		<?php endif; ?>
	</section>
	<?php if ($this->options->JAside_Notice) : ?>
		<section class="joe_aside__item notice">
			<div class="joe_aside__item-title">
				<span class="text">站点公告</span>
			</div>
			<div class="joe_aside__item-contain" style="color: var(--main-color);">
				<?php $this->options->JAside_Notice() ?>
			</div>
		</section>
	<?php endif; ?>
	<?php if ($this->options->JAside_Timelife_Status === 'on') : ?>
		<section class="joe_aside__item timelife">
			<div class="joe_aside__item-title">
				<span class="text">人生倒计时</span>
			</div>
			<div class="joe_aside__item-contain"></div>
		</section>
	<?php endif; ?>

	<!-- 自定义侧边栏模块 - PC -->

	<?php $this->options->JCustomAside ? $this->options->JCustomAside() : null ?>

	<!-- 自定义侧边栏模块 - PC -->

	<?php if ($this->options->JAside_History_Today === 'on') : ?>
		<?php
		$time = time();
		$todayDate = date('m/d', $time);
		$db = Typecho_Db::get();
		$prefix = $db->getPrefix();
		$sql = "SELECT * FROM `{$prefix}contents` WHERE created < {$time} and FROM_UNIXTIME(created, '%m/%d') = '{$todayDate}' and type = 'post' and status = 'publish' and (password is NULL or password = '') LIMIT 10";
		$result = $db->query($sql);
		$historyTodaylist = [];
		if ($result instanceof Traversable) {
			$year = date('Y');
			foreach ($result as $item) {
				$item = Typecho_Widget::widget('Widget_Abstract_Contents')->push($item);
				if ($item['year'] == $year) continue;
				$historyTodaylist[] = array(
					"title" => htmlspecialchars($item['title']),
					"permalink" => $item['permalink'],
					"date" => $item['year'] . ' ' . $item['month'] . '/' . $item['day']
				);
			}
		}
		?>
		<?php if (count($historyTodaylist) > 0) : ?>
			<section class="joe_aside__item today">
				<div class="joe_aside__item-title">
					<span class="text">那年今日</span>
				</div>
				<ul class="joe_aside__item-contain">
					<?php foreach ($historyTodaylist as $item) : ?>
						<li class="item">
							<div class="tail"></div>
							<div class="head"></div>
							<div class="desc">
								<time datetime="<?php echo $item['date'] ?>"><?php echo $item['date'] ?></time>
								<a href="<?php echo $item['permalink'] ?>" title="<?php echo $item['title'] ?>">
									<?php echo $item['title'] ?>
								</a>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</section>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ($this->options->JAside_Hot_Num && $this->options->JAside_Hot_Num !== 'off') : ?>
		<section class="joe_aside__item hot">
			<div class="joe_aside__item-title">
				<span class="text">热门文章</span>
			</div>
			<?php $this->widget('Widget_Contents_Hot@Aside', 'pageSize=' . $this->options->JAside_Hot_Num)->to($item); ?>
			<ol class="joe_aside__item-contain">
				<?php if ($item->have()) : ?>
					<?php $index = 1; ?>
					<?php while ($item->next()) : ?>
						<li class="item">
							<a class="link" href="<?php $item->permalink(); ?>" title="<?php $item->title(); ?>">
								<i class="sort"><?php echo $index; ?></i>
								<img width="100%" height="130" class="image lazyload" src="<?php joe\getLazyload(); ?>" data-src="<?php echo joe\getThumbnails($item)[0]; ?>" alt="<?php $item->title() ?>" />
								<div class="describe">
									<h6><?php $item->title(); ?></h6>
									<span><?php $item->views(); ?> 阅读 - <?php $item->date('m/d'); ?></span>
								</div>
							</a>
						</li>
						<?php $index++; ?>
					<?php endwhile; ?>
				<?php else : ?>
					<li class="empty">这个博主很懒！</li>
				<?php endif; ?>
			</ol>
		</section>
	<?php endif; ?>
	<?php if ($this->options->JAside_Newreply_Status === 'on' && $this->options->JCommentStatus !== 'off') : ?>
		<section class="joe_aside__item newreply">
			<div class="joe_aside__item-title">
				<span class="text">最新回复</span>
			</div>
			<?php $this->widget('Widget_Comments_Recent', 'ignoreAuthor=true&pageSize=3')->to($item); ?>
			<ul class="joe_aside__item-contain">
				<?php if ($item->have()) : ?>
					<?php while ($item->next()) : ?>
						<li class="item">
							<div class="user">
								<img width="40" height="40" class="avatar lazyload" src="<?php joe\getAvatarLazyload(); ?>" data-src="<?php joe\getAvatarByMail($item->mail) ?>" alt="<?php $item->author(false) ?>" />
								<div class="info">
									<div class="author"><?php $item->author(false) ?></div>
									<span class="date"><?php $item->date('Y-m-d'); ?></span>
								</div>
							</div>
							<div class="reply">
								<a class="link" href="<?php _parseAsideLink($item->permalink); ?>">
									<?php _parseAsideReply($item->content); ?>
								</a>
							</div>
						</li>
					<?php endwhile; ?>
				<?php else : ?>
					<li class="empty">人气很差！一条回复没有！</li>
				<?php endif; ?>
			</ul>
		</section>
	<?php endif; ?>
	<?php if ($this->options->JAside_Weather_Key) : ?>
		<section class="joe_aside__item weather" data-key="<?php $this->options->JAside_Weather_Key() ?>" data-style="<?php $this->options->JAside_Weather_Style() ?>">
			<div class="joe_aside__item-title">
				<span class="text">今日天气</span>
			</div>
			<div class="joe_aside__item-contain">
				<div id="he-plugin-standard"></div>
			</div>
		</section>
	<?php endif; ?>
	<?php if ($this->options->JAside_3DTag === 'on') : ?>
		<section class="joe_aside__item tags">
			<div class="joe_aside__item-title">
				<span class="text">标签云</span>
			</div>
			<?php $this->widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 50))->to($tags); ?>
			<div class="joe_aside__item-contain">
				<?php if ($tags->have()) : ?>
					<div class="tag"></div>
					<ul class="list" style="display: none;">
						<?php while ($tags->next()) : ?>
							<li data-url="<?php $tags->permalink(); ?>" data-label="<?php $tags->name(); ?>"></li>
						<?php endwhile; ?>
					</ul>
				<?php else : ?>
					<div class="empty">暂无标签</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>
	<?php if ($this->options->JADContent) : ?>
		<a class="joe_aside__item advert" target="_blank" rel="noopener noreferrer nofollow" href="<?php echo explode("||", $this->options->JADContent)[1] ?? ''; ?>" title="广告">
			<img class="lazyload" width="100%" src="<?php joe\getLazyload() ?>" data-src="<?php echo explode("||", $this->options->JADContent)[0] ?? ''; ?>" alt="广告" />
			<span class="icon">广告</span>
		</a>
	<?php endif; ?>
	<?php if ($this->options->JAside_Flatterer === 'on') : ?>
		<section class="joe_aside__item flatterer">
			<div class="joe_aside__item-title">
				<span class="text">舔狗日记</span>
			</div>
			<div class="joe_aside__item-contain">
				<div class="content"></div>
				<div class="change">
					<svg class="icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="20" height="20">
						<path d="M1000.61 625.5c-24.6-33.4-55.3-155.5-69.3-231.5-3.8-20.6-18.7-36.9-38.8-42.6-4-1.1-8.1-1.8-12.2-1.9-35.3-59-74.5-66.7-100.5-71.8-18.5-3.6-18.8-4.5-21.5-11.1-13.1-32.1-32.3-54-57.1-65.1-20.8-9.4-41.4-9.2-53.7-9.2-.9 0-2-.2-3.2-.5-.8-.2-1.6-.3-2.4-.4-39.3-56.7-70.7-68.1-108.5-68.1h-.2c-38.1 0-63 21-81.2 36.4l-1.6 1.4c-21.3 18-24.9 18.8-33.7 15.2-45.3-18.6-84.6-8.1-116.8 31-13.6 16.6-20.7 29-25.4 37.1l-.1.2c-5.1-.7-10.3-1.6-15.4-2.5-27.5-4.9-51.8 6.7-72.4 34.5-16.7 22.5-27.7 51.7-34.2 73.1-1.7-.2-3.3-.3-5-.3-27.1 0-50.4 20.3-54 47.2-5.5 39.8-15.3 87.4-26.2 127.3-13.4 48.9-27.5 83.2-40.8 99.3-27.6 33.4-28.7 66.5-24.7 88.4 6.7 37.3 34.9 73.7 75.5 97.3 55.3 32.2 158.1 92 447 92 268 0 356.3-52.2 414.8-86.8l2.2-1.3c2.3-1.4 4.5-2.7 6.8-4 18.6-10.8 63-41.6 73.8-93.3 4.4-21.8 4.5-55-21.2-90zM919.01 759c-3 1.8-6.1 3.6-9.3 5.5-27.1 16-60.7 35.9-118.5 51.5-67.9 18.3-155.2 27.2-266.9 27.2-273.4 0-367.5-54.8-418.1-84.2-20.2-11.8-43.4-33.1-47.8-57.7-2.6-14.5 1.6-28.5 12.5-41.6 22.3-27 42.5-78.2 60-152.3 10.3-43.7 16.6-82.8 18.8-97.2 28.9 25.2 104.2 42.6 148.1 51 73.8 14.1 161.6 22.5 234.9 22.5 68.4 0 140.7-7.1 203.7-20.1 62.7-12.9 110.4-30.4 134.6-49.3 1.9-.2 3.7-.6 5.5-1.2 7.7 39.5 39.9 194.9 77.8 246.5 10.6 14.4 14.3 29.2 11.2 44.2-4.3 20.1-21.7 40.8-46.5 55.2zm-271.3-509.5c23.2-.1 41.5-.2 57.3 38.6 14.8 36.3 44.2 42 63.7 45.9 18.9 3.7 38.5 7.6 59.3 40.1-15.5 9-49.3 21.8-101.4 32.7v-1c-1.7-55.7-39.4-82-61.3-88.7-7.3-2.3-15.1-1.5-21.9 2.1-6.8 3.6-11.8 9.6-14.1 17-4.7 15.2 3.9 31.3 19 35.9.8.3 19.9 6.8 20.7 35.5.1 3 .7 6 1.8 9-45.5 6.3-91.7 9.6-137.6 9.6h-.8c-68 0-150.1-7.7-219.4-20.6-60.1-11.2-93.1-22.8-108.5-29.4 11.5-43.5 32-79.4 44.4-77.4 38.1 6.7 55.8 8.2 75.1-25.2 4-6.9 9.5-16.4 20.3-29.6 17.9-21.8 31.6-21.8 50.4-14.1 42.5 17.4 70.8-6.5 91.5-24l3.7-3.1c14-11.8 26.1-22.1 43.3-22.1 18.3 0 32.8 0 65.4 49.3 0 .1.1.2.1.3.2.5.4 1 .7 1.5 13 17.6 32.6 17.7 48.3 17.7z" />
						<path d="M197.61 503.7c-15.7-2.2-30.3 8.9-32.4 24.6-3.6 25.7-10.5 55.9-18.6 80.8-9.8 30.3-20.5 50.7-30.8 59.1-6 4.8-9.9 11.6-10.8 19.2-.9 7.6 1.2 15.2 6 21.2s11.6 9.9 19.2 10.8c1.2.1 2.3.2 3.5.2 6.4 0 12.6-2.1 17.7-6.2.2-.2.4-.3.6-.5 21.2-17.1 39.2-50.4 53.4-98.8 11-37.4 16-71.6 16.9-78.1 2-15.6-9-30.2-24.7-32.3zm234.9-238.6c-6.6-4-14.3-5.2-21.8-3.4l-.4.1c-55.8 13.8-74.3 65.3-76.5 93.6-.6 7.7 1.9 15.1 6.9 20.9 5 5.8 12 9.4 19.6 9.9h.1c.7.1 1.4.1 2.1.1 14.9 0 27.5-11.5 28.7-26.6 0-.3 3.2-34.7 32.9-42.1 7.5-1.8 13.8-6.4 17.8-13s5.2-14.3 3.4-21.8c-1.6-7.4-6.2-13.7-12.8-17.7zm144.2 34.3c-1.8.4-18 3.3-28.7-18.6-6.9-14.3-24.2-20.2-38.5-13.3-6.9 3.4-12.1 9.2-14.6 16.5-2.5 7.3-2 15.1 1.3 22 22.5 46.2 61.9 51.2 77.8 51.2 5.8 0 11.4-.6 16.2-1.8 7.5-1.8 13.8-6.4 17.8-13s5.2-14.3 3.4-21.8c-1.8-7.5-6.4-13.8-13-17.8s-14.3-5.2-21.7-3.4z" />
					</svg>
				</div>
			</div>
		</section>
	<?php endif; ?>

</aside>