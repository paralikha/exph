<?php

namespace Comment\Support\Relations;

trait MorphToCommentable
{
   /**
    * Get all of the owning reviewable models.
    *
    * @return \Illuminate\Database\Eloquent\Model
    */
   public function commentable()
   {
       return $this->morphTo();
   }
}
