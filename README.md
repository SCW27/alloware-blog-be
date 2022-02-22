
## API Reference

#### Create Blog Post

```http
  POST /api/post
```

| Header | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `accept` | `string` | **Required**. application/json |

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `title` | `string` | **Required** |
| `content` | `string` | **Required** |

#### Create Comment or Reply to a comment

```http
  POST api/comment
```

| Header | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `accept`      | `string` | **Required**. application/json |

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required** |
| `comment` | `string` | **Required** |
| `blog_id` | `integer` | **Required** |
| `parent_id` | `integer` | **Required** |


```http
  POST /api/post/{blog_post_id} default as 1
```

| Header | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `accept`      | `string` | **Required**. application/json |
