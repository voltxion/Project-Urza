<?php
class Test extends Controller {

	function index() {

		$category = new Category();
		$category->title = "The CodeIgniter Lounge";

		$forum = new Forum();
		$forum->title = "Introduce Yourself!";
		$forum->description = "Use this forum to introduce yourself to the CodeIgniter community, or to announce your new CI powered site.";
		// add category to the forum
		$forum->Category = $category;

		$forum2 = new Forum();
		$forum2->title = "The Lounge";
		$forum2->description = "CodeIgniter's social forum where you can discuss anything not related to development. No topics off limits... but be civil.";

		// you can also add the other way around
		// add forum to the category
		$category->Forums []= $forum2;

		// a different syntax (array style)

		$category2 = new Category();
		$category2['title'] = "CodeIgniter Development Forums";

		$forum3 = new Forum();
		$forum3['title'] = "CodeIgniter Discussion";
		$forum3['description'] = "This forum is for general topics related to CodeIgniter";

		$forum4 = new Forum();
		$forum4['title'] = "Code and Application Development";
		$forum4['description'] = "Use the forum to discuss anything related to programming and code development.";

		$category2['Forums'] []= $forum3;
		$category2['Forums'] []= $forum4;

		// flush() saves all unsaved objects
		$conn = Doctrine_Manager::connection();
		$conn->flush();

		echo "Success!";

	}

}
?>