## IEEE-UVCE API

This api will be used in the official IEEE-Website for interaction with the frontend code.

```bash
  Contact Admin for the API_KEY
```

## The base URL is

```bash
https://ieee-uvce.000webhostapp.com
```

## Interaction Points for adding event posts

```bash
  ?add=1
  ?update=1
  ?delete=all
  ?delete={id of the record}
  ?fetch=all
  ?fetch={id of the record}
```

## Request to add Posts

Must send a request to add request --> `?add=1`

### Get requests that can be made? / Parameters

#### 1) heading

    ?add=1&heading = {Post heading here}

#### 2) subheading

    ?add=1&subheading = {Post subheading here}

#### 3) form-link

    ?add=1&form-link = {form-link here}

#### 4) img

    ?add=1&img = {img_link_here}

#### 5) last-date

    ?add=1&last-date = {last date here}

### Sample add request

```bash
     https://ieee-uvce.000webhostapp.com?add=1&heading={heading}&subheading={subheading}&form-link={form-link}&last-date={last-date}&img={img_url_here}
```

##### Its not required that all these Parameters have to be passed to insert the record, however `heading` and `subheading` Parameters are compulsary/required and without which other Parameters will not take effect.

## Request Update Posts

Must send a request to update request --> `?update=1`

### Get requests that can be made? / Parameters

#### 0) id

    ?update=1&id = {Post id}

#### 1) heading

    ?update=1&heading = {Post heading here}

#### 2) subheading

    ?update=1&subheading = {Post subheading here}

#### 3) form-link

    ?update=1&form-link = {form-link here}

#### 4) img

    ?update=1&img = {img_link_here}

#### 5) last-date

    ?update=1&last-date = {last date here}

### Sample update request

```bash
     https://ieee-uvce.000webhostapp.com?update=1&id={id to be updated}&heading={heading to be updated}&subheading={heading to be updated}&form-link={form link to be updated}&last-date={last date to be updated}&img={image url to be updated}
```

##### Its not required that all these Parameters have to be passed to insert the record, however `id` Parameter is compulsary/required and without which other Parameters will not take effect.

## Fetch the posts

Must send a request to fetch posts request

```bash
  ?fetch=all
```

this fetches all the posts, or

```bash
  ?fetch={id of the specific post}
```

### Sample fetch request

```bash
    https://ieee-uvce.000webhostapp.com?fetch=all

    or

    https://ieee-uvce.000webhostapp.com?fetch={id of the post}
```

##### Note: either all or the id of the post which needs to be fetched must be passed as a parameter.

## Delete posts

Must send a request to delete posts request

```bash
  ?delete={id of the specific post to be deleted}
```

### Sample fetch request

```bash
    https://ieee-uvce.000webhostapp.com?fetch={id of the post to be deleted}
```

## Add response looks like

![App Screenshot](https://via.placeholder.com/468x300?text=App+Screenshot+Here)

## Fetch response looks like

## Update response looks like

## Delete response looks like
