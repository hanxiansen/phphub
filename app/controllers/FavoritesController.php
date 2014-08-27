<?php

class FavoritesController extends \BaseController
{
	public function createOrDelete($id)
	{
		$topic = Topic::find($id);

		if (Favorite::isUserFavoritedTopic(Auth::user(), $topic))
		{
			Auth::user()->favoriteTopics()->detach($topic->id);
		}
		else
		{
			Auth::user()->favoriteTopics()->attach($topic->id);
		}
		Flash::success(trans('template.Operation succed.'));
		return Redirect::back();
	}


}
