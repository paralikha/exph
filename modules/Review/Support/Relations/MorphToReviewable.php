<?php

namespace Review\Support\Relations;

trait MorphToReviewable
{
   /**
    * Get all of the owning reviewable models.
    *
    * @return \Illuminate\Database\Eloquent\Model
    */
   public function reviewable()
   {
       return $this->morphTo();
   }
}