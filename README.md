<h1 align="center">Modelarium - Laravel Media Library package</h1>

---

This package integrates [Spatie's Laravel Media Library](https://github.com/spatie/laravel-medialibrary) to [Modelarium](https://github.com/Corollarium/modelarium).

## Quick overview

This a Graphql file that reproduces Laravel's default `User` model. Notice the `Email` datatype, as well as the `@migration` directives for the database creation.

```graphql
type Post
  @migrationSoftDeletes
  @migrationTimestamps {
  id: ID!

  name: String!
    @modelFillable
    @renderable(
        label: "Name"
        size: "large"
        itemtype: "name"
        card: true
        title: true
    )

  description: Text!
      @modelFillable
      @renderable(label: "Description", itemtype: "description")

  imageurl: Url @migrationSkip

  image: LaravelMediaLibraryData
      @migrationSkip
      @laravelMediaLibraryData(
          collection: "image"
          fields: ["url", "description"]
      )

  map: LaravelMediaLibraryData
      @migrationSkip
      @laravelMediaLibraryData(
          collection: "map"
          fields: ["url", "description"]
          conversion: "thumb"
          width: 150
          height: 150
      )
}

```

## Sponsors

[![Corollarium](https://corollarium.github.com/modelarium/logo-horizontal-400px.png)](https://corollarium.com)

## Contributing [![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/Corollarium/modelarium-medialibrary/issues)

Any contributions are welcome. Please send a PR.
