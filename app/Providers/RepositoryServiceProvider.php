<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\{
    IUser,
    ICategory, 
    ITag,
    IPlanterStyle,
    IPlanterSize,
    IPlanterColor,
    IPlantProduct,
    IImage
};

use App\Repositories\Eloquent\{
    UserRepository,
    CategoryRepository,
    TagRepository,
    PlanterStyleRepository,
    PlanterSizeRepository,
    PlanterColorRepository,
    PlantProductRepository,
    ImageRepository
};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IUser::class, UserRepository::class);
        $this->app->bind(ICategory::class, CategoryRepository::class);
        $this->app->bind(ITag::class, TagRepository::class);
        $this->app->bind(IPlanterStyle::class, PlanterStyleRepository::class);
        $this->app->bind(IPlanterSize::class, PlanterSizeRepository::class);
        $this->app->bind(IPlanterColor::class, PlanterColorRepository::class);
        $this->app->bind(IPlantProduct::class, PlantProductRepository::class);
        $this->app->bind(IImage::class, ImageRepository::class);
    }
}
